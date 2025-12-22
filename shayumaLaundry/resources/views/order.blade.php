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
                <form method="POST">
                    @csrf
                    <!-- Layanan -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Layanan</label>
                        <select name="layanan" class="form-select" required>
                            <option value="">Pilih Layanan</option>
                            <option value="Cuci Kering" {{ request('layanan') == 'Cuci Kering' ? 'selected' : '' }}>Cuci Kering</option>
                            <option value="Cuci Setrika" {{ request('layanan') == 'Cuci Setrika' ? 'selected' : '' }}>Cuci Setrika</option>
                        </select>
                    </div>

                    <!-- Berat -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Berat (Kg)</label>
                        <input type="number" name="berat" class="form-control" placeholder="Masukkan berat laundry"min="1"required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <a href="/laundry" class="btn btn-outline-secondary w-50 rounded-pill">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-success w-50 rounded-pill">
                            Order
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</x-layout>