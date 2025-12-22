<x-layout title="Riwayat Order">
    <div class="container my-5">
        <h3 class="fw-bold mb-4 text-center">Riwayat Pesanan</h3>

        @if($orders->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada riwayat pesanan.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Layanan</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Resi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>{{ $order->layanan->layanan ?? '-' }}</td>
                            <td>{{ ucfirst($order->jenis_layanan) }}</td>
                            <td>
                                {{ $order->jumlah }}
                                {{ $order->jenis_layanan == 'kilo' ? 'Kg' : 'Item' }}
                            </td>
                            <td>Rp{{ number_format($order->total_harga) }}</td>
                            <td>
                                <a href="{{ url('/resi/'.$order->id) }}" class="btn btn-sm btn-outline-secondary">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
