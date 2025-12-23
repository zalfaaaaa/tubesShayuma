<x-layout title="Riwayat Order">
    <div class="container-fluid py-5 px-5 fade-in">
        <div class="card border-0 shadow-lg bg-white bg-opacity-90 round">
            <div class="card-body">

                <h3 class="fw-bold mb-4 text-center">Riwayat Pesanan</h3>

                <div class="table-responsive round overflow-hidden shadow mb-4">
                    <table class="table table-borderless align-middle text-center ">
                        <thead class="table-secondary">
                            <tr>    
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Layanan</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td>{{ $order->layanan->layanan }}</td>
                                    <td>{{ $order->total_harga_label }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('order.resi', $order->id) }}"
                                           class="btn btn-sm btn-outline-ungu rounded-4">Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-layout>
