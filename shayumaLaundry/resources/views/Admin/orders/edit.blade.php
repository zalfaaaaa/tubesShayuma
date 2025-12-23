<x-layout title="Proses Order">
    <div class="container mt-5">
    <h4 class="fw-bold mb-4">Proses Order</h4>

    <form method="POST" action="/admin/orders/{{ $order->id }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Berat (Kg)</label>
            <input type="number" step="0.1" name="berat" class="form-control" value="{{ $order->berat }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="MENUNGGU_PEMBAYARAN">Menunggu</option>
                <option value="DIPROSES">Diproses</option>
                <option value="SELESAI">Selesai</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
    </div>
</x-layout>