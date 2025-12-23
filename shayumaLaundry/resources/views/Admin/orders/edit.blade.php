<x-layout>
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient text-center text-white fw-bold"
                     style="background: linear-gradient(135deg, #f6a9ff, #fff7c9);">
                    ✏️ Edit Layanan
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('admin.layanan.update', $layanan->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Layanan -->
                        <div class="mb-3">
                            <label class="form-label">Nama Layanan</label>
                            <input type="text" class="form-control"
                                   name="layanan"
                                   value="{{ $layanan->layanan }}" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="4"
                                      name="descLayanan" required>{{ $layanan->descLayanan }}</textarea>
                        </div>

                        <!-- Waktu -->
                        <div class="mb-3">
                            <label class="form-label">Waktu Layanan</label>
                            <select class="form-select" name="waktuLayanan">
                                <option value="Reguler" {{ $layanan->waktuLayanan=='Reguler'?'selected':'' }}>
                                    Reguler
                                </option>
                                <option value="Express" {{ $layanan->waktuLayanan=='Express'?'selected':'' }}>
                                    Express
                                </option>
                            </select>
                        </div>

                        <!-- Jenis -->
                        <div class="mb-3">
                            <label class="form-label">Jenis Layanan</label>
                            <select class="form-select" name="jenisLayanan">
                                <option value="Kilo" {{ $layanan->jenisLayanan=='Kilo'?'selected':'' }}>
                                    Kilo
                                </option>
                                <option value="Satuan" {{ $layanan->jenisLayanan=='Satuan'?'selected':'' }}>
                                    Satuan
                                </option>
                            </select>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control"
                                   name="harga"
                                   value="{{ $layanan->harga }}" required>
                        </div>

                        <!-- Gambar -->
                        <div class="mb-4">
                            <label class="form-label">Gambar (Opsional)</label>
                            <input type="file" class="form-control" name="imgLayanan">

                            @if($layanan->imgLayanan)
                                <img src="{{ asset('storage/'.$layanan->imgLayanan) }}"
                                     class="img-thumbnail mt-3"
                                     width="200">
                            @endif
                        </div>

                        <!-- Button -->
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.dashboard') }}"
                               class="btn btn-outline-secondary w-50">
                                Batal
                            </a>

                            <button class="btn btn-primary w-50">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>