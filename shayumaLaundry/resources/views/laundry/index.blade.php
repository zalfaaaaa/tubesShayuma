<x-layout title="Laundry">
    <div class="container-fluid p-0">

        <!-- Hero Image Section -->
        <section class="hero-section d-flex align-items-center justify-content-center py-4">
            <img 
                src="{{ asset('img/laundry.png') }}" 
                class="img-fluid shadow-lg mt-5" 
                style="max-width: 90%; height: auto;"
                alt="Shayuma Laundry">
        </section>

        <!-- Welcome Content -->
        <section class="content py-4">
            <div class="container text-center">
                <h1 class="title display-5 fw-bold">Welcome to Shayuma Laundry</h1>

                <p class="hero-text mt-3">
                    Shayuma Laundry adalah solusi laundry bersih, wangi, dan rapi dengan proses higienis serta pengerjaan tepat waktu. 
                    Kami mengutamakan kualitas dan pelayanan terbaik untuk setiap pelanggan.
                </p>

                <p class="hero-slogan fst-italic">
                    “Sekali cuci, langsung jatuh cinta”
                </p>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services py-5">
            <div class="container text-start">
                <h2 class="title fw-bold mb-4">Layanan Kami</h2>

                <div class="row g-4">
                    <!-- Cuci Setrika -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('img/cuciSetrika.png') }}" class="card-img-top" alt="Cuci Setrika">

                            <div class="card-body">
                                <h5 class="card-title fw-bold">Cuci Setrika</h5>
                                <p class="card-text">
                                    Pakaian dicuci bersih, wangi, dan disetrika rapi dengan perawatan sesuai jenis kain.
                                </p>

                                <a href="{{ url('/order?layanan=Cuci Setrika') }}" class="btn btn-primary">
                                    Order
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Cuci Kering -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('img/cuciKering.png') }}" class="card-img-top" alt="Cuci Kering">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Cuci Kering</h5>
                                <p class="card-text">
                                    Pakaian dicuci dan dikeringkan hingga bersih dan wangi tanpa proses setrika.
                                </p>

                                <a href="{{ url('/order?layanan=Cuci Kering') }}" class="btn btn-primary">
                                    Order
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Setrika -->
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img 
                                src="{{ asset('img/setrika.png') }}" 
                                class="card-img-top" 
                                alt="Setrika">

                            <div class="card-body">
                                <h5 class="card-title fw-bold">Setrika</h5>
                                <p class="card-text">
                                    Layanan setrika rapi dan halus dengan suhu sesuai jenis kain.
                                </p>

                                <a href="/order" class="btn btn-primary">
                                    Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-layout>