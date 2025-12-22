<nav class="navbar navbar-light bg-white border-bottom px-4 shadow p-2">
    <div class="d-flex align-items-center gap-3">
        <img src="img/logo.png" width="35" height="35" class="me-2">
        <h2 class="mt-2 fw-bolder">Shayuma Laundry ∘˙○˚.•⋅</h2>
    </div>

    <div class="ms-auto d-flex align-items-center gap-2">
        @guest
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endguest

        @auth
            <span class="me-2">Halo, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0">Logout</button>
            </form>
        @endauth
    </div>
</nav>
