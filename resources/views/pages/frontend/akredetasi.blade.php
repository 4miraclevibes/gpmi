@extends('layouts.frontend.main')

@section('styles')
<style>
    .akreditasi  {
        font-weight: bold;
        color: #fff;
    }
    .page-hero {
        background-image: url('https://filemanager.layananberhentikuliah.com/storage/files/W3NJ8rGt1hdIv21wQwL7K896QJvnxXmyN8WzzxQd.jpg');
        background-size: cover;
        background-position: center;
        height: 500px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .page-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .page-hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
        color: white;
    }

    .page-hero-title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 0;
    }

    .page-content {
        padding: 4rem 0;
    }

    .page-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .page-text {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #333;
    }
</style>
@endsection

@section('content')
<div class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
        <h1 class="page-hero-title">Akreditasi</h1>
    </div>
</div>
<div class="mt-4 container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="description-container bg-white text-dark" style="max-height: 1920px; overflow-y: auto;">
                        <p class="mt-3 description text-dark bg-white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
                        </p>
                    </div>
                    <div class="container">
                        <h1 class="mb-4 text-center">Download pada link berikut:</h1>
                        
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center bg-success text-white" colspan="4">DEPARTEMEN/PROGRAM STUDI</th>
                                </tr>
                                <tr>
                                    <th class="text-center">PROGRAM STUDI</th>
                                    <th class="text-center">KATEGORI</th>
                                    <th class="text-center">PERIODE</th>
                                    <th class="text-center">AKREDITASI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="font-weight-bold bg-light text-center">PROGRAM SARJANA</td>
                                </tr>
                                <tr>
                                    <td>ADMINISTRASI PENDIDIKAN (AP)</td>
                                    <td>Nasional</td>
                                    <td>13 Desember 2020 s/d 13 Desember 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view?usp=share_link" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>BIMBINGAN KONSELING (BK)</td>
                                    <td>Nasional</td>
                                    <td>1 November 2020 s/d 1 November 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1kWfKmjxAk4lQ3zjhZeBbbo2CBy0hkR_l/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>KURIKULUM DAN TEKNOLOGI PENDIDIKAN (KTP)</td>
                                    <td>Nasional</td>
                                    <td>30 Desember 2020 s/d 30 Desember 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1I7taaFy4_4dbAVm-ptJSHFrY20GtYfud/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>KURIKULUM DAN TEKNOLOGI PENDIDIKAN (KTP)</td>
                                    <td>Nasional</td>
                                    <td>5 Desember 2020 s/d 31 Desember 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1YYpVfzcMRNKErzTB8iLs1ekxlCes1sxf/view" target="_blank" class="btn btn-primary btn-sm">AQAS</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN GURU PENDIDIKAN ANAK USIA DINI (PG-PAUD)</td>
                                    <td>Nasional</td>
                                    <td>16 April 2024 s/d 9 Maret 2026</td>
                                    <td><a href="https://drive.google.com/file/d/1fxd9NewKCCvkFZcD_KzJJvAsWU-H8Q5_/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN GURU SEKOLAH DASAR (PGSD)</td>
                                    <td>Nasional</td>
                                    <td>6 Desember 2022 s/d 5 Desember 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1UgftsHL41W841BpsfVOgZujNHEORoiv2/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN GURU SEKOLAH DASAR (PGSD)</td>
                                    <td>Nasional</td>
                                    <td>5 Desember 2022 s/d 31 Desember 2028</td>
                                    <td><a href="https://drive.google.com/file/d/1SuHk3M2D4xGCeFoYOFuzninF2rb3-UcE/view" target="_blank" class="btn btn-primary btn-sm">AQAS</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN LUAR BIASA (PLB)</td>
                                    <td>Nasional</td>
                                    <td>29 September 2023 s/d 6 Oktober 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1yFrr7CfZ4EHG1-LGb_Rmwbf2Gd7BrMQU/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN LUAR BIASA (PLB)</td>
                                    <td>Nasional</td>
                                    <td>5 Desember 2022 s/d 31 Desember 2028</td>
                                    <td><a href="https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view?usp=share_link" target="_blank" class="btn btn-primary btn-sm">AQAS</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN LUAR SEKOLAH (PLS)</td>
                                    <td>Nasional</td>
                                    <td>13 Desember 2020 s/d 13 Desember 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1f6k1w13LflmygzhcUNfbvsSleoQ92LSE/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN LUAR SEKOLAH (PLS)</td>
                                    <td>Nasional</td>
                                    <td>1 November 2020 s/d 1 November 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view?usp=share_link" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN PROFESI KONSELOR (PPK)</td>
                                    <td>Nasional</td>
                                    <td>5 Desember 2022 s/d 31 Desember 2028</td>
                                    <td><a href="https://drive.google.com/file/d/1JbMTLgAmJ5ekwyksVa2yeat_jPaSceuk/view?usp=share_link" target="_blank" class="btn btn-primary btn-sm">AQAS</a></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="font-weight-bold bg-light text-center">PROGRAM MAGISTER</td>
                                </tr>
                                <tr>
                                    <td>ADMINISTRASI PENDIDIKAN (AP)</td>
                                    <td>Nasional</td>
                                    <td>4 July 2023 s/d 3 July 2028</td>
                                    <td><a href="https://drive.google.com/file/d/18qIFU361BVs435ydOn6vSBhKJib4Ripb/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>BIMBINGAN KONSELING (BK)</td>
                                    <td>Nasional</td>
                                    <td>10 September 2019 s/d 10 September 2024</td>
                                    <td><a href="https://drive.google.com/file/d/1lFUffViaZY6A3f0CdUhDI2LeaOQ5OAcT/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN DASAR (PENDAS)</td>
                                    <td>Nasional</td>
                                    <td>16 Agustus 2023 s/d 15 Agustus 2028</td>
                                    <td><a href="https://drive.google.com/file/d/1He7BKI1yNVIKBCxMgg95qLlmp0N6KAPg/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>PENDIDIKAN ANAK USIA DINI (PAUD)</td>
                                    <td>Nasional</td>
                                    <td>11 Agustus 2020 s/d 11 Agustus 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1WeXv5DGBNbiMuhB3FYHO6UbeulWpPFj2/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="font-weight-bold bg-light text-center">PROGRAM DOKTOR</td>
                                </tr>
                                <tr>
                                    <td>ADMINISTRASI PENDIDIKAN (AP)</td>
                                    <td>Nasional</td>
                                    <td>20 Oktober 2020 s/d 20 Oktober 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1E_KeH7VDkzOnpQV2RtI2qXNhOHCSSZSP/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                                <tr>
                                    <td>BIMBINGAN KONSELING (BK)</td>
                                    <td>Nasional</td>
                                    <td>3 November 2020 s/d 3 November 2025</td>
                                    <td><a href="https://drive.google.com/file/d/1ErQTE8aYaNlj-GcyCabANGQs_3gJu6Lt/view" target="_blank" class="btn btn-primary btn-sm">BAN-PT</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection