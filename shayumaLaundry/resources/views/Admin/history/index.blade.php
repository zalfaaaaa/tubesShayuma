<x-layout title="History Order">

<div class="container">
    <h3 class="mb-4 fw-bold">📜 History Order</h3>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Layanan</th>
                <th>Berat (kg)</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->layanan->layanan }}</td>
                <td>{{ $order->berat }} kg</td>
                <td>Rp{{ number_format($order->total_harga) }}</td>
                <td>
                    <span class="badge bg-success">
                        {{ str_replace('_',' ', $order->status) }}
                    </span>
                </td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">
                    Belum ada history order
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</x-layout>
