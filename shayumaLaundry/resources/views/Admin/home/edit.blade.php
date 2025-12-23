<x-layout>
    <div class="container d-flex justify-content-center align-items-center mt-5 mb-5">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-center mb-4">Edit Layanan</h4>

                    <form action="{{ route('admin.layanan.update', $layanan->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Layanan</label>
                            <input type="text"
                                   name="layanan"
                                   value="{{ old('layanan', $layanan->layanan) }}"
                                   class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="descLayanan"
                                      rows="3"
                                      class="form-control rounded-3">{{ old('descLayanan', $layanan->descLayanan) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Waktu Layanan</label>
                                <select name="waktuLayanan" class="form-select rounded-3">
                                    <option value="Reguler" {{ $layanan->waktuLayanan == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                    <option value="Express" {{ $layanan->waktuLayanan == 'Express' ? 'selected' : '' }}>Express</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Jenis Layanan</label>
                                <select name="jenisLayanan" class="form-select rounded-3">
                                    <option value="Kilo" {{ $layanan->jenisLayanan == 'Kilo' ? 'selected' : '' }}>Kilo</option>
                                    <option value="Satuan" {{ $layanan->jenisLayanan == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga</label>
                            <input type="number"
                                   name="harga"
                                   value="{{ old('harga', $layanan->harga) }}"
                                   class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar (Opsional)</label>
                            <input type="file" name="imgLayanan" class="form-control rounded-3">
                        </div>

                        @if($layanan->imgLayanan)
                            @if(str_contains($layanan->imgLayanan, '/'))
                                <img src="{{ asset('storage/' . $layanan->imgLayanan) }}"
                                    width="150"
                                    class="mb-3 rounded">
                            @else
                                <img src="{{ asset('img/' . $layanan->imgLayanan) }}"
                                    width="150"
                                    class="mb-3 rounded">
                            @endif
                        @endif

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.dashboard') }}"
                               class="btn btn-outline-danger w-50 rounded-4">
                                Batal
                            </a>
                            <button type="submit"
                                    class="btn text-white w-50 rounded-4"
                                    style="background-color:#9d4edd">
                                Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
