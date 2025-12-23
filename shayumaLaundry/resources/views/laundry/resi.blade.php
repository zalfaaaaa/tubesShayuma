<x-layout title="Resi Laundry">
    <div class="container mt-5 mb-5 fade-in">
        <div class="card shadow rounded-4">
            <div class="card-body p-4">

                <h4 class="fw-bold text-center mb-4">Resi Laundry</h4>

                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $order->user->name }}</td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td>: {{ $order->user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $order->user->address }}</td>
                    </tr>
                    <tr>
                        <th>Layanan</th>
                        <td>
                            : {{ $order->layanan->layanan }}
                            ({{ ucfirst($order->layanan->jenisLayanan) }})
                        </td>
                    </tr>
                    <tr>
                        <th>Harga / Kg</th>
                        <td>: Rp {{ number_format($order->layanan->harga) }}</td>
                    </tr>
                    <tr>
                        <th>Berat</th>
                        <td>: {{ $order->berat }} Kg</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td class="fw-bold">
                            : Rp {{ number_format($order->berat * $order->layanan->harga) }}
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            : <span class="badge bg-warning text-dark">
                                {{ str_replace('_',' ', $order->status) }}
                              </span>
                        </td>
                    </tr>
                </table>

                <div class="text-end mt-4">
                    <a href="/laundry" class="btn btn-outline-secondary rounded-pill">
                        Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layout>
