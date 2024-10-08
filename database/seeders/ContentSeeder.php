<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tujuan = 'Badan Penjaminan Mutu UNP bertujuan menyiapkan sistem penjaminan mutu yang efektif dan efisien dalam rangka pelaksanaan tridharma perguruan tinggi yang bermutu';
        $sasaran = 'Tercapainya standar minimal pelaksanaan tridharma perguruan tinggi sesuai dengan standar nasional pendidikan tinggi';
        $tugas = 'Badan Penjamin Mutu Internal berfungsi melaksanakan, mengkoordinasikan, memantau dan mengevaluasi kegiatan penjaminan mutu akademik UNP';
        Content::create([
            'tujuan' => $tujuan,
            'sasaran' => $sasaran,
            'tugas' => $tugas,
        ]);
    }
}
