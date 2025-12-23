<nav class="bg-white border-bottom shadow px-4 py-2">
    <div class="container-fluid">

        <!-- BARIS ATAS -->
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('img/logo.png') }}" width="35" height="35">
                <h2 class="m-0 fw-bolder">Shayuma Laundry ∘˙○˚.•⋅</h2>
            </div>

            <div class="ms-auto d-flex align-items-center gap-2">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-ungu btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                @endguest

                @auth
                    <span class="me-2 fw-bolder" style="color:#9d4edd">Halo, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button onclick="return confirm('Kamu yakin ingin logout?')" type="submit" class="btn btn-link text-danger p-0 fw-bolder">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
        <hr class="my-2">
        <div class="d-flex gap-4">
            <a href="{{ route('laundry') }}" class="text-decoration-none fw-bold" style="color:#9d4edd">Home</a>
            @auth
                @role('pelanggan')
                    <a href="{{ route('riwayat') }}" class="text-decoration-none fw-bold" style="color:#9d4edd">
                        Orderan Kamu
                    </a>
                    <a href="{{ route('history') }}" class="text-decoration-none fw-bold" style="color:#9d4edd">
                        History
                    </a>
                @endrole
            @endauth

            @auth
                @role('admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none fw-bold" style="color:#9d4edd">Kelola Layanan</a>
                    <a href="{{ route('admin.orders') }}" class="text-decoration-none fw-bold" style="color:#9d4edd">Orders</a>
                    <a href="{{ route('admin.history') }}" class="text-decoration-none fw-bold" style="color:#9d4edd">History</a>
                @endrole
            @endauth

        </div>

    </div>
</nav>
