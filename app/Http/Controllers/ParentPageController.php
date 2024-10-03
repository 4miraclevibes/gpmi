<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentPage;
use Illuminate\Support\Facades\Auth;

class ParentPageController extends Controller
{
    public function index()
    {
        $parentPages = ParentPage::all();
        return view('pages.backend.parentPages.index', compact('parentPages'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        ParentPage::create($data);
        return redirect()->route('parent-pages.index')->with('success', 'Parent page created successfully');
    }
    public function update(Request $request, ParentPage $parentPage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $parentPage->update($data);
        return redirect()->route('parent-pages.index')->with('success', 'Parent page updated successfully');
    }
    public function destroy(ParentPage $parentPage)
    {
        $parentPage->delete();
        return redirect()->route('parent-pages.index')->with('success', 'Parent page deleted successfully');
    }
}
