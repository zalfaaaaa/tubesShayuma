<x-layout>
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Layanan</h2>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <input type="text" name="layanan"
               value="{{ old('layanan', $layanan->layanan) }}"
               class="form-control mb-3">

        <textarea name="descLayanan" class="form-control mb-3">{{ old('descLayanan', $layanan->descLayanan) }}</textarea>

        <select name="waktuLayanan" class="form-control mb-3">
            <option value="Reguler" {{ $layanan->waktuLayanan == 'Reguler' ? 'selected' : '' }}>Reguler</option>
            <option value="Express" {{ $layanan->waktuLayanan == 'Express' ? 'selected' : '' }}>Express</option>
        </select>

        <select name="jenisLayanan" class="form-control mb-3">
            <option value="Kilo" {{ $layanan->jenisLayanan == 'Kilo' ? 'selected' : '' }}>Kilo</option>
            <option value="Satuan" {{ $layanan->jenisLayanan == 'Satuan' ? 'selected' : '' }}>Satuan</option>
        </select>

        <input type="number" name="harga"
               value="{{ old('harga', $layanan->harga) }}"
               class="form-control mb-3">

        <label>Gambar (Opsional)</label>
        <input type="file" name="imgLayanan" class="form-control mb-3">

        @if($layanan->imgLayanan)
            <img src="{{ asset('storage/'.$layanan->imgLayanan) }}"
                 width="150"
                 class="mb-3 rounded">
        @endif

        <button class="btn btn-outline-ungu w-100">Update</button>
    </form>
</div>
</x-layout>
