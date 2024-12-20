<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="{{ asset('assets/landing/images/logo-white.png') }}" alt="Logo" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('landing') ? 'active' : '' }}" aria-current="page" href="{{ route('landing') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('akreditasi') ? 'active' : '' }}" aria-current="page" href="{{ route('akreditasi') }}">Akreditasi</a>
                </li>
                @foreach ($pages as $page)
                <li class="nav-item">
                    <a class="nav-link {{ $page->name }}" href="{{ route('pages.show', $page->id) }}">{{ $page->name }}</a>
                </li>
                @endforeach
                @foreach ($nestingPages as $nestingPage)
                <li class="nav-item">
                    <a class="nav-link {{ $nestingPage->name }}" href="{{ route('nesting-pages.show', $nestingPage->id) }}">{{ $nestingPage->name }}</a>
                </li>
                @endforeach
                @foreach ($parentPages as $parentPage)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ $parentPage->name }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ $parentPage->name }}
                    </a>
                    <ul class="dropdown-menu">
                      @foreach ($parentPage->childPages as $childPage)
                      <li><a class="dropdown-item" href="{{ route('child-pages.show', $childPage->id) }}">{{ $childPage->name }}</a></li>
                      @endforeach
                    </ul>
                  </li>
                @endforeach
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="google-translate-element">
                        <i class="bi bi-translate"></i> Terjemahkan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>