<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use App\Models\AkreditasiDepartment;

class AkreditasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Artisan::call('migrate:refresh --path=database/migrations/2024_10_07_044239_create_akreditasi_departments_table.php');
        // Artisan::call('migrate:refresh --path=database/migrations/2024_10_07_044537_create_akreditasi_study_programs_table.php');
        // Artisan::call('migrate:refresh --path=database/migrations/2024_10_07_044555_create_study_program_documents_table.php');
        $departments = [
            [
                'name' => 'Deparment 1',
                'study_programs' => [
                    [
                        'name' => 'Study Program 1',
                        'documents' => [
                            [
                                'name' => 'Dokumen 1',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 2',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Study Program 2',
                        'documents' => [
                            [
                                'name' => 'Dokumen 3',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 4',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Study Program 3',
                        'documents' => [
                            [
                                'name' => 'Dokumen 5',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 6',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Deparment 2',
                'study_programs' => [
                    [
                        'name' => 'Study Program 4',
                        'documents' => [
                            [
                                'name' => 'Dokumen 7',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 8',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Study Program 5',
                        'documents' => [
                            [
                                'name' => 'Dokumen 9',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 10',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Study Program 6',
                        'documents' => [
                            [
                                'name' => 'Dokumen 11',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 12',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Deparment 3',
                'study_programs' => [
                    [
                        'name' => 'Study Program 7',
                        'documents' => [
                            [
                                'name' => 'Dokumen 13',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 14',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Study Program 8',
                        'documents' => [
                            [
                                'name' => 'Dokumen 15',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 16',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Study Program 9',
                        'documents' => [
                            [
                                'name' => 'Dokumen 17',
                                'category' => 'Nasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                            [
                                'name' => 'Dokumen 18',
                                'category' => 'Internasional',
                                'sertificate' => 'https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view',
                                'period' => '1 Januari 2024 - 31 Desember 2024',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($departments as $departmentData) {
            $department = AkreditasiDepartment::create([
                'name' => $departmentData['name'],
                'status' => $departmentData['status'] ?? 'Active',
            ]);

            foreach ($departmentData['study_programs'] as $studyProgramData) {
                $studyProgram = $department->akreditasiStudyPrograms()->create([
                    'name' => $studyProgramData['name'],
                    'status' => $studyProgramData['status'] ?? 'Active',
                ]);

                foreach ($studyProgramData['documents'] as $documentData) {
                    $studyProgram->studyProgramDocuments()->create([
                        'name' => $documentData['name'],
                        'category' => $documentData['category'],
                        'sertificate' => $documentData['sertificate'],
                        'period' => $documentData['period'],
                        'status' => $documentData['status'] ?? 'Active',
                    ]);
                }
            }
        }
    }
}
