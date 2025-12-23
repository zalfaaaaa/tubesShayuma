<x-layout title="Laundry">
    <div class="container-fluid p-0 fade-in">

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
                <h1 class="text-white fw-bold hi " >𓆉 ⋆｡˚𓇼 Welcome to Shayuma Laundry ⋆｡˚𓆟</h1>
                <p class="mx-auto mt-1 col-md-8 text-white fw-bolder hi">
                    Shayuma Laundry adalah solusi laundry bersih, wangi, dan rapi dengan proses higienis serta pengerjaan tepat waktu. 
                    Kami mengutamakan kualitas dan pelayanan terbaik untuk setiap pelanggan.&nbsp;<span class="hero-slogan fst-italic">“Sekali cuci, langsung jatuh cinta”</span>
                </p>
            </div>
        </section>
        <section class="services py-5">
            <div class="container text-start">
                <h1 class="title text-white fw-bold mb-5 mt-5 text-center hi">⊹₊˚‧︵‿₊୨ Layanan Kami ୧₊‿︵‧˚₊⊹</h1>

                <div class="row g-4">
                    @foreach($layanans as $layanan)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-lg rounded-4">
                                <img src="{{ asset('img/' . $layanan->imgLayanan) }}" class="rounded-top-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">𑣲{{ $layanan->layanan }}</h5>
                                    <p class="card-text" style="text-align:justify">{{ $layanan->descLayanan }}</p>
                                    <p class="mb-4 text-justify" style="color:black;background: linear-gradient(135deg, #F6A9FF, #FFF7C9);;border-radius:6px">&nbsp;<strong> {{ $layanan->jenisLayanan }} | {{ $layanan->waktuLayanan }} | Rp{{ number_format($layanan->harga) }}</strong></p>
                                    <div class="text-end">
                                        <a href="{{ url('/order?layanan_id='.$layanan->id) }}" class="btn btn-outline-ungu rounded-4" style="width:100%">Order</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="content py-5 mb-5 mt-5">
            <div class="container text-center">
                <h1 class="text-white fw-bold mb-5 hi">╰┈➤ About Us ⌯⌲</h1>

                <div class="row align-items-center">
                    <!-- MAP -->
                    <div class="col-md-7 mb-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body p-0">
                                <div class="ratio ratio-16x9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8685371409906!2d107.6261626!3d-6.906319699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7ec4f8fbe39%3A0xedace3a3c6a3e731!2sKopi%20Mandja%20Roastery!5e0!3m2!1sen!2sid!4v1766515722518!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-4"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CONTACT INFO -->
                    <div class="col-md-5">
                        <div class="card shadow rounded-4 p-4">
                            <h4 class="text-center mb-4 fw-bolder">Contact us through:</h4>

                            <p class="text-start"><i class="fas fa-envelope text-warning"></i>
                                <strong>Email:</strong>
                                <a href="mailto:shayumaTatakae@gmail.com">shayumaTatakae@gmail.com</a>
                            </p>

                            <p class="text-start"><i class="fab fa-twitter-square text-primary"></i>
                                <strong>Twitter:</strong> @shayumaLau
                            </p>

                            <p class="text-start"><i class="fab fa-instagram" style="color:#fd0db5"></i>
                                <strong>Instagram:</strong> @shayumaLaundry
                            </p>

                            <p class="text-start"><i class="fas fa-phone-square text-success"></i>
                                <strong>Phone:</strong> 022 202 066
                            </p>

                            <p class="text-start"><i class="fas fa-map-marker-alt text-danger"></i>
                                <strong>Location:</strong> Jl. Cibuni No.3, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>