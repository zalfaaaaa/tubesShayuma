<x-layout title="Admin Order">
    <div class="container mt-5">
    <h3>Data Order Laundry</h3>

    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Nama</th>
        <th>Layanan</th>
        <th>Jenis</th>
        <th>Berat (Kg)</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    </thead>

    <tbody>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->layanan->layanan }}</td>
        <td>{{ $order->jenis }}</td>

        <td>
            <form method="POST" action="/admin/order/{{ $order->id }}">
                @csrf
                @method('PUT')
                <input type="number" name="berat" value="{{ $order->berat }}" min="1" class="form-control form-control-sm">
        </td>

        <td>
            <select name="status" class="form-select form-select-sm">
                <option {{ $order->status=='MENUNGGU'?'selected':'' }}>MENUNGGU</option>
                <option {{ $order->status=='DIPROSES'?'selected':'' }}>DIPROSES</option>
                <option {{ $order->status=='SELESAI'?'selected':'' }}>SELESAI</option>
            </select>
        </td>

        <td>
            <button class="btn btn-sm btn-success">Update</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
</x-layout>
