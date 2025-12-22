<x-layout title="Order Laundry">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

        <div class="card shadow-lg border-0 rounded-4" style="width: 100%; max-width: 500px;">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-4 text-center">Order Laundry</h4>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- FORM ORDER --}}
                <form method="POST" action="/order">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">No Telepon</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->phone }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control" rows="2" readonly>{{ auth()->user()->address }}</textarea>
                    </div>
                    <!-- Layanan -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Layanan</label>
                        <select name="layanan_id" class="form-select" required>
                            <option value="">Pilih Layanan</option>
                            @foreach($layanans as $layanan)
                                <option value="{{ $layanan->id }}" {{ isset($selectedLayanan) && $selectedLayanan->id == $layanan->id ? 'selected' : '' }}> {{ $layanan->layanan }} - Rp{{ number_format($layanan->harga) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jumlah -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Jumlah (Kg / Satuan)
                        </label>
                        <input type="number"
                               name="jumlah"
                               class="form-control"
                               placeholder="Masukkan jumlah"
                               min="1"
                               step="0.1"
                               required>
                    </div>

                    <!-- Tanggal Masuk -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Masuk</label>
                        <input type="date"
                               name="tanggal_masuk"
                               class="form-control"
                               required>
                    </div>

                    <!-- Jam Pickup -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Jam Pickup (opsional)</label>
                        <input type="time"
                               name="jam_pickup"
                               class="form-control">
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <a href="/laundry" class="btn btn-outline-secondary rounded-pill">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-success rounded-pill">
                            Order
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layout>
