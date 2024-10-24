<?php

namespace App\Http\Controllers;

use App\Models\NestingPage;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class PageContentController extends Controller
{
    public function index(NestingPage $nestingPage)
    {
        $pageContents = $nestingPage->pageContents()->with('user')->get();
        return view('pages.backend.nestingPages.pageContents.index', compact('nestingPage', 'pageContents'));
    }

    public function create(NestingPage $nestingPage)
    {
        return view('pages.backend.nestingPages.pageContents.create', compact('nestingPage'));
    }

    public function store(Request $request, NestingPage $nestingPage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'background_image' => 'nullable|url',
            'status' => 'required|in:active,inactive',
            'created_at' => 'required|date',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['nesting_page_id'] = $nestingPage->id;
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = Carbon::parse($request->created_at)->format('Y-m-d');

        PageContent::create($data);

        return redirect()->route('nesting-page.page-contents.index', $nestingPage)->with('success', 'Konten Halaman berhasil dibuat.');
    }

    public function edit(PageContent $pageContent)
    {
        return view('pages.backend.nestingPages.pageContents.edit', compact('pageContent'));
    }

    public function update(Request $request, PageContent $pageContent)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'background_image' => 'nullable|url',
            'status' => 'required|in:active,inactive',
            'created_at' => 'required|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['created_at'] = Carbon::parse($request->created_at)->format('Y-m-d');

        $pageContent->update($data);

        return redirect()->route('nesting-page.page-contents.index', $pageContent->nestingPage)->with('success', 'Konten Halaman berhasil diperbarui.');
    }

    public function destroy(PageContent $pageContent)
    {
        $pageContent->delete();
        return redirect()->route('nesting-page.page-contents.index', $pageContent->nestingPage)->with('success', 'Konten Halaman berhasil dihapus.');
    }
}
