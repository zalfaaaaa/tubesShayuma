<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4 text-center">Tambah Layanan</h4>
                        <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Layanan</label>
                                <input type="text" name="layanan" class="form-control @error('layanan') is-invalid @enderror" value="{{ old('layanan') }}" placeholder="Contoh: Cuci Kering">
                                @error('layanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Deskripsi Layanan</label>
                                <textarea name="descLayanan" rows="3" class="form-control @error('descLayanan') is-invalid @enderror" placeholder="Deskripsi singkat layanan">{{ old('descLayanan') }}</textarea>
                                @error('descLayanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Waktu Layanan</label>
                                    <select name="waktuLayanan" class="form-select @error('waktuLayanan') is-invalid @enderror">
                                        <option value="">pilih waktu</option>
                                        <option value="Reguler" {{ old('waktuLayanan') == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                        <option value="Express" {{ old('waktuLayanan') == 'Express' ? 'selected' : '' }}>Express</option>
                                    </select>
                                    @error('waktuLayanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Jenis Layanan</label>
                                    <select name="jenisLayanan"class="form-select @error('jenisLayanan') is-invalid @enderror">
                                        <option value="">pilih jenis</option>
                                        <option value="Kilo" {{ old('jenisLayanan') == 'Kilo' ? 'selected' : '' }}>Kilo</option>
                                        <option value="Satuan" {{ old('jenisLayanan') == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                                    </select>
                                    @error('jenisLayanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Contoh: 12000">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Gambar Layanan</label>
                                <input type="file" name="imgLayanan" class="form-control @error('imgLayanan') is-invalid @enderror">
                                @error('imgLayanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.dashboard') }}"class="btn btn-outline-danger rounded-4">Batal</a>
                                <button type="submit" class="btn btn text-white rounded-4 px-4" style="background-color: #9d4edd">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
