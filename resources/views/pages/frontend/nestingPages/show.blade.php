@extends('layouts.frontend.main')

@section('styles')
<style>
    .{{ $nestingPage->name }} {
        font-weight: bold;
        color: #fff;
    }
    .page-hero {
        background-image: url({{ $nestingPage->background_image }});
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

    .news-section {
        padding: 4rem 0;
        background-color: #fff;
    }

    .news-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    .news-item {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .news-item:hover {
        transform: translateY(-5px);
    }

    .news-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .news-content {
        padding: 1.5rem;
    }

    .news-item-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .news-item-meta {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .news-item-excerpt {
        font-size: 1rem;
        color: #444;
        line-height: 1.5;
    }
</style>
@endsection

@section('content')
<div class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content">
        <h1 class="page-hero-title">{{ $nestingPage->name }}</h1>
    </div>
</div>
<div class="mt-4 container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="description-container bg-white text-dark" style="max-height: 1920px; overflow-y: auto;">
                        <p class="mt-3 description text-dark bg-white">{!! $nestingPage->body ?? '' !!}</p>
                    </div>
                    <div class="news-section">
                        <div class="news-container">
                            <div class="news-grid">
                                @foreach ($nestingPage->pageContents as $pageContent)
                                <div class="news-item">
                                    <a href="{{ route('nesting-pages.page-contents.show', [$nestingPage->id, $pageContent->id]) }}">
                                        <img src="{{ $pageContent->background_image ?? 'https://via.placeholder.com/300x200' }}" alt="{{ $pageContent->name }}" class="news-image">
                                    </a>
                                    <div class="news-content">
                                        <h3 class="news-item-title">{{ $pageContent->name }}</h3>
                                        <p class="news-item-meta">
                                            <span class="author">{{ $pageContent->user->name }}</span> |
                                            <span class="date">{{ $pageContent->created_at->format('d F Y') }}</span>
                                        </p>
                                        <p class="news-item-excerpt">
                                            {{ Str::limit(strip_tags($pageContent->body), 100) }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection