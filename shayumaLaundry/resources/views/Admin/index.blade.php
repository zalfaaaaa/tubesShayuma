<x-layout title="Admin Orders">
    <div class="container-fluid py-5 px-5 fade-in">
        <div class="card border-0 shadow-lg bg-white bg-opacity-90 rounded-4">
            <div class="card-body">

                <h3 class="fw-bold mb-4 text-center">Riwayat Pesanan</h3>

                <div class="table-responsive rounded-4 overflow-hidden shadow">
                    <table class="table align-middle text-center mb-0">
                        <thead class="bg-ungu text-white">
                            <tr>
                                <th>Nama</th>
                                <th>Layanan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->layanan->layanan }}</td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <td>
                                    <form action="{{ route('admin.orders.status', $order) }}" method="POST">
    @csrf
    @method('PUT')

    <select name="status" class="form-select form-select-sm mb-2">
        @foreach (['PICKUP','MENUNGGU_PEMBAYARAN','DIPROSES','SELESAI','DIAMBIL'] as $status)
            <option value="{{ $status }}"
                {{ $order->status == $status ? 'selected' : '' }}>
                {{ str_replace('_',' ', $status) }}
            </option>
        @endforeach
    </select>

    <input type="number"
           name="berat"
           value="{{ $order->berat }}"
           min="1"
           class="form-control form-control-sm mb-2">

    <button class="btn btn-sm btn-success">Update</button>
</form>

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
