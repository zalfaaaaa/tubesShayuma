<x-layout title="Resi Laundry">
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-4">Resi Laundry</h4>

                    <table class="table table-borderless">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $user->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Layanan</th>
                            <td>{{ $layanan->layanan }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>
                                {{ ucfirst($order->jenis_hitung) }} /
                                {{ ucfirst($order->waktu_layanan) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $order->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td class="fw-bold text-success">
                                Rp{{ number_format($order->total_harga) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-warning">
                                    {{ $order->status }}
                                </span>
                            </td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="/order" class="btn btn-outline-secondary">
                            Order Lagi
                        </a>

                        <button class="btn btn-success">
                            Bayar Sekarang
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</x-layout>
