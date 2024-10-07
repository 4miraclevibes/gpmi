@extends('layouts.frontend.main')

@section('styles')
<style>
    .{{ $page->name }} {
        font-weight: bold;
        color: #fff;
    }
    .page-hero {
        background-image: url({{ $page->background_image ?? 'https://filemanager.layananberhentikuliah.com/storage/documents/GvFxOqlo3UXSokZVimCdtQtSeqbvuzlJbNacGru6.jpg' }});
        background-size: cover;
        background-position: center;
        height: 300px;
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
        <h1 class="page-hero-title">{{ $page->name }}</h1>
    </div>
</div>
<div class="mt-4 container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="description-container bg-white text-dark" style="max-height: 1920px; overflow-y: auto;">
                        <p class="mt-3 description text-dark bg-white">{!! $page->body ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection