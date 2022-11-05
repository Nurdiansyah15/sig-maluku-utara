<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-4 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="/dishub.png"
            width="36" height="42" alt="">
        <span class="fs-4 mx-3">BPTD XXIV MALUKU UTARA</span>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
        @if (auth()->user() != null)
            <li><a href="/list_aduan" class="nav-link px-2 link-dark">Aduan</a></li>
            <li><a href="/fasilitas" class="nav-link px-2 link-dark">FasKes</a></li>
        @else
            <li><a href="/aduan" class="nav-link px-2 link-dark">Aduan</a></li>
            <li><a href="/kontak" class="nav-link px-2 link-dark">Hubungi Kami</a></li>
        @endif
        @auth
            <li><a href="/user" class="nav-link px-2 link-dark">Pengguna</a></li>
        @endauth
        <!-- <li><a href="#" class="nav-link px-2 link-dark">About</a></li> -->
    </ul>
    @if (auth()->user() != null)
        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="{{ url('/') }}/user.png" alt="mdo" width="32" height="32"
                    class="rounded-circle"> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu text-small">
                <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->
                <!-- <li><a class="dropdown-item" href="/user">Pengguna</a></li> -->
                <!-- <li><a class="dropdown-item" href="#">Profil</a></li> -->
                <!-- <li>
                    <hr class="dropdown-divider">
                </li> -->
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>
    @else
        <div class="col-md-2 text-end">
            <a href="/login" type="button" class="btn btn-outline-primary me-2">Login</a>
        </div>
    @endif
</header>
