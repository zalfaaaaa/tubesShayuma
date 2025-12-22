<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Shayuma Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right,
                #C5A7FF,
                #F6A9FF,
                #FFF7C9,
                #FFF7C9,
                #F6A9FF,
                #C5A7FF
            );
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-card {
            background: #fff;
            padding: 35px;
            width: 350px;
            border-radius: 25px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .login-card h2 {
            margin: 0;
            font-weight: 600;
        }

        .login-card p {
            margin: 5px 0 20px;
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-top: 5px;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #8bc34a;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background: #8bc34a;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #7cb342;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
        }

        .footer-text a {
            color: #8bc34a;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
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

        <button class="btn-login" type="submit">Login</button>
    </form>

    <div class="footer-text">
        Belum punya akun?
        <a href="/register">Daftar</a>
    </div>
</div>

</body>
</html>
