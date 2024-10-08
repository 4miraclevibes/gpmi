<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::first();
        return view('pages.backend.content.index', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'tujuan' => 'required',
            'sasaran' => 'required',
            'tugas' => 'required',
            'tugas_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);
        $data = $request->all();
        if ($request->hasFile('tugas_image')) {
            if ($content->tugas_image) {
                Storage::delete($content->tugas_image);
            }
            $data['tugas_image'] = $request->file('tugas_image')->store('tugas_image', 'public');
        }
        $content->update($data);
        return redirect()->route('content.index')->with('success', 'Content updated successfully');
    }
}
