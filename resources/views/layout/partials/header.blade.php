<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="https://dishub.jakarta.go.id/wp-content/uploads/2018/08/cropped-LOGO-KEMENTERIAN-PERHUBUNGAN.png"
            width="36" height="42" alt="">
        <span class="fs-4 mx-3">BPTD XXIV MALUKU UTARA</span>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
        @if (auth()->user() != null)
            <li><a href="/list_aduan" class="nav-link px-2 link-dark">Aduan</a></li>
        @else
            <li><a href="/aduan" class="nav-link px-2 link-dark">Aduan</a></li>
        @endif
        <li><a href="#" class="nav-link px-2 link-dark">Kontak</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        @auth
            <li><a href="/fasilitas" class="nav-link px-2 link-dark">Fasilitas</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Administrator</a></li>
        @endauth
    </ul>
    @if (auth()->user() != null)
        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                    class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
                {{-- <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>
    @else
        <div class="col-md-3 text-end">
            <a href="/login" type="button" class="btn btn-outline-primary me-2">Login</a>
        </div>
    @endif
</header>
