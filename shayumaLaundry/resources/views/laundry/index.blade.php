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
        <section class="services py-5">
            <div class="container text-start">
                <h2 class="title fw-bold mb-4">Layanan Kami</h2>

                <div class="row g-4">
                    @foreach($layanans as $layanan)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ asset('img/' . $layanan->img_Layanan) }}" width="200" class="rounded"alt="{{ $layanan->layanan }}">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $layanan->layanan }}</h5>

                                    <p class="card-text">{{ $layanan->desclayanan }}</p>

                                    <p class="mb-2 text-primary"><strong> {{ $layanan->jenisLayanan }}<br>{{ $layanan->waktuLayanan }}<br>Rp{{ number_format($layanan->harga) }}</strong></p>

                                    <a href="{{ url('/order?layanan_id='.$layanan->id) }}" class="btn btn-primary">Order</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layout>