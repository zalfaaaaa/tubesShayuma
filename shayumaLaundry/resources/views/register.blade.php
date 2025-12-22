<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Shayuma Laundry</title>
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

        .register-card {
            background: #fff;
            padding: 35px;
            width: 350px;
            border-radius: 25px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .register-card h2 {
            margin: 0;
            font-weight: 600;
        }

        .register-card p {
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

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #8bc34a;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-top: 5px;
            font-size: 14px;
            resize: vertical;
        }

        .btn-register {
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

        .btn-register:hover {
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

<div class="register-card">
    <h2>✨ SHAYUMA Laundry</h2>
    <p>Daftar akun baru</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••" required>
        </div>

        <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="phone" placeholder="Masukkan nomor telepon" maxlength="15">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" placeholder="Masukkan alamat" rows="3" maxlength="255"></textarea>
        </div>

        <button class="btn-register" type="submit">Daftar</button>
    </form>

    <div class="footer-text">
        Sudah punya akun?
        <a href="/login">Login</a>
    </div>
</div>

</body>
</html>
