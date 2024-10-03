<?php

namespace App\Http\Controllers;

use App\Models\ChildPage;
use App\Models\ParentPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ChildPageController extends Controller
{
    public function index(ParentPage $parentPage)
    {
        $childPages = $parentPage->childPages()->with('user')->get();
        return view('pages.backend.parentPages.childPages.index', compact('childPages', 'parentPage'));
    }

    public function create(ParentPage $parentPage)
    {
        return view('pages.backend.parentPages.childPages.create', compact('parentPage'));
    }

    public function store(Request $request, ParentPage $parentPage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'background_image' => 'nullable|url',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['parent_page_id'] = $parentPage->id;
        $data['slug'] = Str::slug($request->name);

        $parentPage->childPages()->create($data);

        return redirect()->route('parent-pages.child-pages.index', $parentPage)->with('success', 'Halaman Anak berhasil dibuat.');
    }

    public function edit(ChildPage $childPage)
    {
        return view('pages.backend.parentPages.childPages.edit', compact('childPage'));
    }

    public function update(Request $request,ChildPage $childPage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'background_image' => 'nullable|url',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['user_id'] = Auth::user()->id;
        $childPage->update($data);

        return redirect()->route('parent-pages.child-pages.index', $childPage->parentPage)->with('success', 'Halaman Anak berhasil diperbarui.');
    }

    public function destroy(ParentPage $parentPage, ChildPage $childPage)
    {
        $childPage->delete();
        return redirect()->route('parent-pages.child-pages.index', $parentPage)->with('success', 'Halaman Anak berhasil dihapus.');
    }
}
