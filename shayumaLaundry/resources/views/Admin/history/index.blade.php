<x-layout>
<div class="container-fluid py-5 px-5 fade-in">
    <div class="card border-0 shadow-lg bg-white bg-opacity-90 round">
        <div class="card-body">

            <h3 class="fw-bold mb-4 text-center">Riwayat Pesanan</h3>
            

            <div class="table-responsive round overflow-hidden shadow mb-4">
                <table class="table table-borderless align-middle text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Layanan</th>
                            <th>Jenis | Waktu</th>
                            <th>Harga Satuan</th>
                            <th>Berat</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->layanan->layanan }}</td>
                            <td>{{ $order->layanan->jenisLayanan }} | {{ $order->layanan->waktuLayanan }}</td>
                            <td>{{ $order->layanan->harga }}</td>
                            <td>{{ $order->berat }} kg</td>
                            <td>Rp {{ number_format($order->total_harga) }}</td>
                            <td>
                                <span class="badge bg-success">
                                    {{ str_replace('_',' ', $order->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-4">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">Belum ada data order</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</x-layout>
