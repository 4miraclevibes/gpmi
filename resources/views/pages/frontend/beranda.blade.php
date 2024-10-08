@extends('layouts.frontend.main')

@section('styles')
<style>
    .hero-section {
        background-image: url('https://filemanager.layananberhentikuliah.com/storage/documents/GvFxOqlo3UXSokZVimCdtQtSeqbvuzlJbNacGru6.jpg');
        background-size: cover;
        background-position: center;
        height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        text-align: center;
        color: white;
        z-index: 1;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    .hero-button {
        background-color: #e91e63;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1.2rem;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .hero-button:hover {
        background-color: #c2185b;
    }

    .goals-section {
        background-color: #f5f5f5;
        padding: 4rem 0;
        text-align: center;
    }

    .goals-title {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .goals-subtitle {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 3rem;
    }

    .goals-container {
        display: flex;
        justify-content: center;
        gap: 4rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .goal-item {
        flex: 1;
        max-width: 500px;
    }

    .goal-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
    }

    .goal-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .goal-heading {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 1rem;
    }

    .goal-description {
        font-size: 1rem;
        color: #666;
        line-height: 1.6;
    }

    .duties-section {
        position: relative;
        background-image: url('path/to/your/background-image.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 4rem 0;
    }

    .duties-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .duties-container {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .duties-content {
        flex: 1 1 60%;
        padding-right: 2rem;
    }

    .duties-image {
        flex: 1 1 35%;
        max-width: 35%;
    }

    .duties-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .duties-title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .duties-description {
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .duties-container {
            flex-direction: column;
        }

        .duties-content, .duties-image {
            flex: 1 1 100%;
            max-width: 100%;
            padding-right: 0;
        }

        .duties-image {
            margin-top: 2rem;
        }

        .duties-title {
            font-size: 2rem;
        }

        .duties-description {
            font-size: 1rem;
        }
    }

    .management-section {
        background-color: #f5f5f5;
        padding: 4rem 0;
        text-align: center;
    }

    .management-title {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .management-subtitle {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 3rem;
    }

    .management-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .management-item {
        flex: 1;
        min-width: 250px;
        max-width: 300px;
    }

    .management-image {
        width: 200px;
        height: 250px;
        margin: 0 auto 1rem;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .management-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .management-name {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .management-position {
        font-size: 1rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .management-position-en {
        font-size: 0.9rem;
        color: #999;
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">BPMI</h1>
        <p class="hero-subtitle">Badan Penjaminan Mutu Internal</p>
        <a href="#" class="d-none hero-button">TENTANG KAMI</a>
    </div>
</div>

<div class="goals-section">
    <h2 class="goals-title">Tujuan dan Sasaran</h2>
    <p class="goals-subtitle">Goals and Objectives</p>
    <div class="goals-container">
        <div class="goal-item">
            <div class="goal-icon">
                <img src="https://i0.wp.com/bpmi.unp.ac.id/wp-content/themes/hestia/assets/img/feat1.png?w=750&ssl=1" alt="Tujuan Icon">
            </div>
            <h3 class="goal-heading">Tujuan (Goal)</h3>
            <p class="goal-description">{{ $content->tujuan ?? 'Tujuan' }}</p>
        </div>
        <div class="goal-item">
            <div class="goal-icon">
                <img src="https://i0.wp.com/bpmi.unp.ac.id/wp-content/themes/hestia/assets/img/feat2.png?w=750&ssl=1" alt="Sasaran Icon">
            </div>
            <h3 class="goal-heading">Sasaran (Objective)</h3>
            <p class="goal-description">{{ $content->sasaran ?? 'Sasaran' }}</p>
        </div>
    </div>
</div>

<div class="duties-section">
    <div class="duties-overlay"></div>
    <div class="duties-container">
        <div class="duties-content">
            <h2 class="duties-title">Tugas dan Fungsi</h2>
            <p class="duties-description">{{ $content->tugas ?? 'Tugas' }}</p>
        </div>
        <div class="duties-image">
            <img src="{{ Storage::url($content->tugas_image) }}" alt="Tugas dan Fungsi">
        </div>
    </div>
</div>

<div class="management-section">
    <h2 class="management-title">Unsur Pimpinan</h2>
    <p class="management-subtitle">Management</p>
    <div class="management-container">
        <div class="management-item">
            <div class="management-image">
                <img src="https://i0.wp.com/bpmi.unp.ac.id/wp-content/uploads/2024/07/Abna-Hidayati34.jpeg?w=776&ssl=1" alt="Prof. Dr. Abna Hidayati, M.Pd.">
            </div>
            <h3 class="management-name">Prof. Dr. Abna Hidayati, M.Pd.</h3>
            <p class="management-position">KEPALA/PIMPINAN</p>
            <p class="management-position-en">Head of Quality Assurance</p>
        </div>
        <div class="management-item">
            <div class="management-image">
                <img src="https://i0.wp.com/bpmi.unp.ac.id/wp-content/uploads/2023/10/Ofianto2-scaled.jpg?w=1920&ssl=1" alt="Dr. Ofianto, M.Pd.">
            </div>
            <h3 class="management-name">Dr. Ofianto, M.Pd.</h3>
            <p class="management-position">KEPALA DIVISI PENJAMINAN MUTU</p>
            <p class="management-position-en">Head of Quality Assurance Division</p>
        </div>
        <div class="management-item">
            <div class="management-image">
                <img src="https://i0.wp.com/bpmi.unp.ac.id/wp-content/uploads/2023/10/Ulfia2.jpg?w=1905&ssl=1" alt="Dr. Ulfia Rahmi, M.Pd.">
            </div>
            <h3 class="management-name">Dr. Ulfia Rahmi, M.Pd.</h3>
            <p class="management-position">KEPALA DIVISI AKREDITASI</p>
            <p class="management-position-en">Head of Accreditation Division</p>
        </div>
        <div class="management-item">
            <div class="management-image">
                <img src="https://i0.wp.com/bpmi.unp.ac.id/wp-content/uploads/2024/07/Anto3.jpg?w=716&ssl=1" alt="Hardiyanto, ST, M.CIO.">
            </div>
            <h3 class="management-name">Hardiyanto, ST, M.CIO.</h3>
            <p class="management-position">KEPALA SUBBAGIAN UMUM</p>
            <p class="management-position-en">Head of General Affairs</p>
        </div>
    </div>
</div>
@endsection