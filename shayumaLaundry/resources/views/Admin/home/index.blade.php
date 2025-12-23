<x-layout title="Laundry">
    <div class="container-fluid p-0 fade-in">
        <!-- Welcome Content -->
        <section class="content py-4">
            <div class="container text-center">
                <h1 class="title display-5 fw-bold">Halaman Admin</h1>

            <section class="services py-5">
                <div class="container text-start">
                    <h2 class="title fw-bold mb-4">Layanan Kami</h2>

                    <div class="row g-4">
                        @foreach($layanans as $layanan)
                            <div class="col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset('img/' . $layanan->imgLayanan) }}">


                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $layanan->layanan }}</h5>

                                        <p class="card-text">{{ $layanan->descLayanan }}</p>

                                        <p class="mb-2 text-primary text-justify"><strong> {{ $layanan->jenisLayanan }}<br>{{ $layanan->waktuLayanan }}<br>Rp{{ number_format($layanan->harga) }}</strong></p>

                                        <div class="text-end">
                                            <a href="{{ url('/order?layanan_id='.$layanan->id) }}" class="btn btn-primary">Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </x-layout>