<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="https://fip.unp.ac.id/img/Logo-header.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('landing') ? 'active' : '' }}" aria-current="page" href="{{ route('landing') }}">Beranda</a>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
            </ul>
            @if (Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </ul>
            @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger" href="#">Join</a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>