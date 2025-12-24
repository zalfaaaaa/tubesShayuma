<x-layout>
<div class="container-fluid py-5 px-5 fade-in">
    <div class="card border-0 shadow-lg bg-white bg-opacity-90 round">
        <div class="card-body">

            <h3 class="fw-bold mb-4 text-center">Riwayat Pesanan</h3>
            <form action="{{ route('admin.history') }}" method="GET" class="flex gap-2 mb-3">
                <select name="month" class="form-select w-auto d-inline rounded-4">
                    @for ($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>{{ Carbon\Carbon::create()->month($m)->format('F') }}</option>
                    @endfor
                </select>

                <select name="week" class="form-select w-auto d-inline rounded-4">
                    <option value="1" {{ $week == 1 ? 'selected' : '' }}>Pekan 1</option>
                    <option value="2" {{ $week == 2 ? 'selected' : '' }}>Pekan 2</option>
                    <option value="3" {{ $week == 3 ? 'selected' : '' }}>Pekan 3</option>
                    <option value="4" {{ $week == 4 ? 'selected' : '' }}>Pekan 4</option>
                    <option value="5" {{ $week == 5 ? 'selected' : '' }}>Pekan 5</option>
                </select>

                <button type="submit" class="btn btn ms-2 rounded-4 text-white" style="background-color: #9d4edd">Filter</button>
            </form>

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
