@extends('layouts.frontend.main')

@section('styles')
<style>
    .akreditasi  {
        font-weight: bold;
        color: #fff;
    }
    .page-hero {
        background-image: url('https://filemanager.layananberhentikuliah.com/storage/documents/GvFxOqlo3UXSokZVimCdtQtSeqbvuzlJbNacGru6.jpg');
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
                            INFORMASI TERKAIT SERTIFIKAT AKREDITASI
                            PROGRAM STUDI DI FAKULTAS ILMU PENDIDIKAN UNIVERSITAS NEGERI PADANG
                            <br> <br>
                            Sertifikat Akreditasi Program Studi Yang terdapat Di Fakultas Ilmu Pendidikan Universitas Negeri Padang,
                            Sertifikat Akreditasi Program Studi FIP UNP dapat di download dibawah ini:
                        </p>
                    </div>
                    <div class="container">
                        <h1 class="mb-4 border-bottom pb-3">Akreditasi Program Studi</h1>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="list-group" id="program-list">
                                    @foreach($departments as $index => $department)
                                        <a href="#" class="list-group-item list-group-item-action {{ $index === 0 ? 'active' : '' }}" data-program="department{{ $department->id }}">{{ $department->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="program-content">
                                    @foreach($departments as $index => $department)
                                        <div id="department{{ $department->id }}" class="program-tab" style="{{ $index === 0 ? '' : 'display: none;' }}">
                                            @foreach($department->akreditasiStudyPrograms as $studyProgram)
                                                <h2>{{ $studyProgram->name }}</h2>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SERTIFIKAT</th>
                                                            <th>KATEGORI</th>
                                                            <th>PERIODE</th>
                                                            <th>DOWNLOAD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($studyProgram->studyProgramDocuments->sortByDesc('created_at') as $document)
                                                            <tr>
                                                                <td class="d-flex align-items-center">
                                                                    <div class="me-3" style="width: 40px; height: 40px; background-image: url('https://baa.uad.ac.id/wp-content/plugins/download-manager/assets/file-type-icons/pdf.svg'); background-size: cover; background-position: center;"></div>
                                                                    <div>
                                                                        <div class="fw-bold">{{ $document->name }}</div>
                                                                        <small class="text-muted">
                                                                            <i class="bi bi-download"></i>
                                                                            <span id="download-count-{{ $document->id }}" class="download-count">0</span> downloads
                                                                        </small>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $document->category }}</td>
                                                                <td>{{ $document->period }}</td>
                                                                <td>
                                                                    <a href="{{ Storage::url($document->sertificate) }}" class="btn btn-primary btn-sm download-btn" data-document-id="{{ $document->id }}" target="_blank">
                                                                        <i class="bi bi-download"></i> Download
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="description-container bg-white text-dark" style="max-height: 1920px; overflow-y: auto;">
                        <p class="mt-5 description text-dark bg-white">
                            Apabila memerlukan informasi lebih lanjut terkait sertifikat Akreditasi depertement di Fakultas Ilmu 
                            Pendidikan dapat menghubungi email: info@fip.unp.ac.id atau langsung ke Fakultas atau Program Studi
                            <br><br>
                            Informasi mengenai legalisir sertifikat akreditasi (surat BAN PT Nomor 1371/BAN-PT/LL/2018 dapat diunduh di : 
                            Penerapan Tanda Tangan Elektronik BAN-PT
                            Dalam rangka peningkatan layanan Badan Akreditasi Nasional Perguruan Tinggi dan sebagai wujud penerapan
                             Peraturan Pemerintah Republik lndonesia Nomor 82 Tahun 2012 tentang Penyelenggaraan Sistem dan Transaksi 
                             Elektronik, maka mulai tanggal 26 Juni 2018:
                            <br><br>
                            1. BAN-PT menerbitkan Serifikat Akreditasi dalam bentuk dokumen elektronik kepada UGM melalui Sistem Akreditasi Perguruan Tinggi Online (SAPTO).
                            <br><br>
                            2. SK tentang Status dan Peringkat Terakreditasi serta Sertifikat Akreditasi diterbitkan dalam bentuk dokumen elektronik tersebut menggunakan tanda tangan elektronik Direktur Dewan Eksekutif BAN-PT.
                            <br><br>
                            3. Dengan digunakannya tanda tangan elektronik, maka Proses legalisir Sertifikat Akreditasi Program Studi yang diterbitkan setelah tanggal 26 Juni 2018 tidak
                            diperlukan lagi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const programList = document.getElementById('program-list');
    const programTabs = document.querySelectorAll('.program-tab');

    programList.addEventListener('click', function(e) {
        if (e.target.classList.contains('list-group-item-action')) {
            e.preventDefault();
            
            // Remove active class from all items
            programList.querySelectorAll('.list-group-item-action').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to clicked item
            e.target.classList.add('active');
            
            // Hide all program tabs
            programTabs.forEach(tab => {
                tab.style.display = 'none';
            });
            
            // Show the selected program tab
            const targetId = e.target.getAttribute('data-program');
            document.getElementById(targetId).style.display = 'block';
        }
    });

    // Inisialisasi jumlah unduhan dari localStorage
    document.querySelectorAll('[id^="download-count-"]').forEach(function(element) {
        var documentId = element.id.split('-')[2];
        var downloads = localStorage.getItem('document-' + documentId + '-downloads') || 0;
        element.textContent = downloads;
    });

    // Tambahkan event listener untuk tombol unduh
    document.querySelectorAll('.download-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var documentId = this.getAttribute('data-document-id');
            var countElement = document.getElementById('download-count-' + documentId);
            var currentCount = parseInt(localStorage.getItem('document-' + documentId + '-downloads') || 0);
            currentCount++;
            localStorage.setItem('document-' + documentId + '-downloads', currentCount);
            countElement.textContent = currentCount;
        });
    });
});
</script>
@endsection