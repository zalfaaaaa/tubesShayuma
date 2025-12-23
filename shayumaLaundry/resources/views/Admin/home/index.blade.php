<x-layout title="Laundry">
        <section class="services py-5">
            <div class="container text-start">
                <h1 class="title text-white fw-bold text-center hi">⊹₊˚‧︵‿₊୨ Kelola Layanan ୧₊‿︵‧˚₊⊹</h1>

                <div class="card glass mx-auto mb-5">
                    <div class="card-body text-center">
                        <a href="{{ route('admin.layanan.create') }}" class="mt-2 btn btn-outline-ungu rounded-4 btn-sm">+ Tambah Layanan</a>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach($layanans as $layanan)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-lg rounded-4">
                                @if(str_contains($layanan->imgLayanan, '/'))
                                    <img src="{{ asset('storage/' . $layanan->imgLayanan) }}">
                                @else
                                    <img src="{{ asset('img/' . $layanan->imgLayanan) }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title fw-bolder">𑣲{{ $layanan->layanan }}</h5>
                                    <p class="card-text" style="text-align:justify">{{ $layanan->descLayanan }}</p>
                                    <p class="mb-4 text-justify" style="color:black;background: linear-gradient(135deg, #F6A9FF, #FFF7C9);;border-radius:6px">&nbsp;<strong> {{ $layanan->jenisLayanan }} | {{ $layanan->waktuLayanan }} | Rp{{ number_format($layanan->harga) }}</strong></p>
                                    <div class="gap-2 d-flex fw-bold">
                                        <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" style="width:50%" onsubmit="return confirm('Yakin mau hapus layanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit"class="btn btn-outline-danger rounded-4 w-100">Delete</button>
                                        </form>
                                        <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-outline-ungu rounded-4" style="width:50%">Update</a>
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