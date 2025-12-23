<form method="POST" action="{{ route('admin.orders.update', $order) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Berat (Kg)</label>
        <input type="number" step="0.1" name="berat"
               class="form-control"
               value="{{ $order->berat }}">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            @foreach (['MENUNGGU_PEMBAYARAN','DIPROSES','SELESAI','DIAMBIL'] as $status)
                <option value="{{ $status }}"
                    {{ $order->status == $status ? 'selected' : '' }}>
                    {{ str_replace('_',' ', $status) }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
