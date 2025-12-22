<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Shayuma Laundry</title>
    <link rel="stylesheet" href="{{ asset('css/regis.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="register-card">
    <h2>✨ Shayuma Laundry</h2>
    <p>Daftar akun baru</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="padding-left: 18px; margin: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Satya Maula Rezki" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="shayuma@example.com" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password 8 karakter" required>
        </div>

        <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="0838********" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" rows="3" placeholder="Jl. Bengawan 06, Bandung" required>{{ old('address') }}</textarea>
        </div>
        <button type="submit" class="btn-register">Daftar</button>
    </form>
    <div class="footer-text">
        Sudah punya akun?<a href="{{ url('/login') }}">Login</a>
    </div>
</div>

</body>
</html>
