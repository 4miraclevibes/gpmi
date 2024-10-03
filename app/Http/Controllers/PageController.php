<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('pages.backend.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('pages.backend.pages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'background_image' => 'nullable|url',
        ]);

        $data = $request->only('name', 'body', 'background_image');

        $data['user_id'] = Auth::user()->id; // Mengatur user_id secara otomatis
        $data['slug'] = Str::slug($data['name']); // Mengatur slug secara otomatis

        // Memastikan slug unik
        $count = 2;
        while (Page::where('slug', $data['slug'])->exists()) {
            $data['slug'] = Str::slug($data['name']) . '-' . $count;
            $count++;
        }
        Page::create($data);
        return redirect()->route('pages.index')->with('success', 'Halaman berhasil dibuat.');
    }

    public function edit(Page $page)
    {
        return view('pages.backend.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'background_image' => 'nullable|url',
        ]);

        // Jika nama berubah, update slug
        if ($request->name !== $page->name) {
            $validatedData['slug'] = Str::slug($request->name);
            
            // Memastikan slug unik
            $count = 2;
            while (Page::where('slug', $validatedData['slug'])->where('id', '!=', $page->id)->exists()) {
                $validatedData['slug'] = Str::slug($request->name) . '-' . $count;
                $count++;
            }
        }

        $page->update($validatedData);

        return redirect()->route('pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }
}
