<x-layout>
    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<input type="text" name="layanan" class="form-control" placeholder="Nama layanan">

<textarea name="descLayanan" class="form-control" placeholder="Deskripsi layanan"></textarea>

<select name="waktuLayanan" class="form-control">
    <option value="Reguler">Reguler</option>
    <option value="Express">Express</option>
</select>

<select name="jenisLayanan" class="form-control">
    <option value="Kilo">Kilo</option>
    <option value="Satuan">Satuan</option>
</select>

<input type="number" name="harga" class="form-control" placeholder="Harga">

<input type="file" name="imgLayanan" class="form-control">

<button type="submit" class="btn btn-primary">Simpan</button>
</form>

</x-layout>