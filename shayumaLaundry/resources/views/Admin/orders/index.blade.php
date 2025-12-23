<x-layout title="Admin Orders">
<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Layanan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->layanan->layanan }}</td>
            <td>
                <span class="badge bg-info">
                    {{ str_replace('_',' ', $order->status) }}
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

                    <!-- 🔑 INPUT BERAT (EDIT INI) -->
                    <input type="number"
    name="berat"
    step="0.1"
    min="3"
    class="form-control form-control-sm mb-2"
    value="{{ $order->berat ?? 3 }}"
    required>

                    <button class="btn btn-sm btn-primary">
                        Update
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</x-layout>