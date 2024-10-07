<?php

namespace App\Http\Controllers;

use App\Models\AkreditasiDepartment;
use App\Models\AkreditasiStudyProgram;
use App\Models\StudyProgramDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkreditasiController extends Controller
{
    public function index()
    {
        $departments = AkreditasiDepartment::with('akreditasiStudyPrograms')->get();
        return view('pages.backend.akreditasi.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'study_programs' => 'required|array|min:1',
            'study_programs.*.name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $department = AkreditasiDepartment::create([
                'name' => $request->name,
                'status' => 'Active' // Status default
            ]);

            foreach ($request->study_programs as $studyProgram) {
                $department->akreditasiStudyPrograms()->create([
                    'name' => $studyProgram['name'],
                    'status' => 'Active' // Status default untuk program studi
                ]);
            }

            DB::commit();
            return redirect()->route('akreditasi-departments.index')->with('success', 'Departemen berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function update(Request $request, AkreditasiDepartment $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $department->update([
                'name' => $request->name,
            ]);

            DB::commit();
            return redirect()->route('akreditasi-departments.index')->with('success', 'Departemen berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(AkreditasiDepartment $department)
    {
        try {
            $department->akreditasiStudyPrograms()->delete();
            $department->delete();
            return redirect()->route('akreditasi-departments.index')->with('success', 'Departemen berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function showDocuments(AkreditasiStudyProgram $akreditasiStudyProgram)
    {
        $akreditasiStudyProgram->load('studyProgramDocuments');
        return view('pages.backend.akreditasi.document', compact('akreditasiStudyProgram'));
    }

    public function storeDocument(Request $request, AkreditasiStudyProgram $akreditasiStudyProgram)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'sertificate' => 'required|string|max:255',
            'period' => 'required|string|max:255',
        ]);

        $akreditasiStudyProgram->studyProgramDocuments()->create([
            'name' => $request->name,
            'category' => $request->category,
            'sertificate' => $request->sertificate,
            'period' => $request->period,
            'status' => 'Active' // Status default
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function updateDocument(Request $request, StudyProgramDocument $document)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'sertificate' => 'required|string|max:255',
            'period' => 'required|string|max:255',
        ]);

        $document->update([
            'category' => $request->category,
            'sertificate' => $request->sertificate,
            'period' => $request->period,
            'name' => $request->name,
            // Status tidak diubah di sini
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroyDocument(StudyProgramDocument $document)
    {
        $document->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }

    public function destroyStudyProgram(AkreditasiStudyProgram $studyProgram)
    {
        try {
            $studyProgram->delete();
            return redirect()->route('akreditasi-departments.index')->with('success', 'Program studi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateStudyProgram(Request $request, AkreditasiStudyProgram $studyProgram)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $studyProgram->update([
                'name' => $request->name,
            ]);
            return redirect()->route('akreditasi-departments.index')->with('success', 'Program studi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
