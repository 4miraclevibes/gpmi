<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::all();
        return view('pages.backend.leader.index', compact('leaders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('leaders', 'public');
            $validatedData['image'] = $imagePath;
        }

        Leader::create($validatedData);

        return redirect()->route('leaders.index')->with('success', 'Pemimpin berhasil ditambahkan.');
    }

    public function update(Request $request, Leader $leader)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($leader->image) {
                Storage::disk('public')->delete($leader->image);
            }
            $imagePath = $request->file('image')->store('leaders', 'public');
            $validatedData['image'] = $imagePath;
        }

        $leader->update($validatedData);

        return redirect()->route('leaders.index')->with('success', 'Data pemimpin berhasil diperbarui.');
    }

    public function destroy(Leader $leader)
    {
        if ($leader->image) {
            Storage::disk('public')->delete($leader->image);
        }

        $leader->delete();

        return redirect()->route('leaders.index')->with('success', 'Pemimpin berhasil dihapus.');
    }
}
