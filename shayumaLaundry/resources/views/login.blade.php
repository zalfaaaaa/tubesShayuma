<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Shayuma Laundry</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="login-card">
        <h2>✨ SHAYUMA Laundry</h2>
        <p>Login ke akun Anda</p>

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="footer-text">
            Belum punya akun?
            <a href="/register">Daftar</a>
        </div>
    </div>

</body>
</html>
