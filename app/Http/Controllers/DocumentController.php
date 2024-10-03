<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('pages.backend.documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|max:20480',
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only('name', 'file');
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('documents', 'public');
        } else {
            return redirect()->route('documents.index')->with('error', 'File not found');
        }

        $data['user_id'] = Auth::user()->id;
        Document::create($data);
        return redirect()->route('documents.index')->with('success', 'Document created successfully');
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document deleted successfully');
    }



}
