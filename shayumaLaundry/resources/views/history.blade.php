<x-layout title="History Order">
    <div class="container my-5 fade-in">
        <h3 class="fw-bold mb-4 text-center">History Pesanan</h3>

        @if($orders->count() == 0)
            <div class="alert alert-info text-center">
                Belum ada history pesanan.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Layanan</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>{{ $order->layanan->layanan ?? '-' }}</td>
                            <td>{{ ucfirst($order->jenis_layanan) }}</td>
                            <td>{{ $order->jumlah }} {{ $order->jenis_layanan == 'kilo' ? 'Kg' : 'Item' }}</td>

                            <td>
                                @if($order->status == 'MENUNGGU')
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif($order->status == 'DIPROSES')
                                    <span class="badge bg-primary">Diproses</span>
                                @elseif($order->status == 'SELESAI')
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ url('/resi/'.$order->id) }}" class="btn btn-sm btn-outline-secondary">
                                    Resi
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
