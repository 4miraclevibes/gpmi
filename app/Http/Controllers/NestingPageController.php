<?php

namespace App\Http\Controllers;

use App\Models\NestingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class NestingPageController extends Controller
{
    public function index()
    {
        $nestingPages = NestingPage::with('user')->get();
        return view('pages.backend.nestingPages.index', compact('nestingPages'));
    }

    public function create()
    {
        return view('pages.backend.nestingPages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'background_image' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->name);

        NestingPage::create($data);

        return redirect()->route('nesting-page.index')->with('success', 'Halaman Nesting berhasil dibuat.');
    }

    public function edit(NestingPage $nestingPage)
    {
        return view('pages.backend.nestingPages.edit', compact('nestingPage'));
    }

    public function update(Request $request, NestingPage $nestingPage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'background_image' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $nestingPage->update($data);

        return redirect()->route('nesting-page.index')->with('success', 'Halaman Nesting berhasil diperbarui.');
    }

    public function destroy(NestingPage $nestingPage)
    {
        $nestingPage->delete();
        return redirect()->route('nesting-page.index')->with('success', 'Halaman Nesting berhasil dihapus.');
    }
}
