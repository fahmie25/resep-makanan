<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Rasa Nusantara</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #F8F1E3;
        }
        .page {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box {
            width: 420px;
            text-align: center;
        }
        .logo img {
            width: 120px;
        }
        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #B3261E;
            margin: 10px 0 20px;
        }
        .input-wrapper {
            background-color: #E3DFDA;
            border-radius: 999px;
            padding: 10px 18px;
            margin-bottom: 14px;
            text-align:left;
        }
        .input-wrapper input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            font-size: 16px;
        }
        .btn-submit {
            width: 100%;
            margin-top: 10px;
            padding: 10px 0;
            border-radius: 999px;
            border: none;
            background-color: #B3261E;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .back {
            margin-top: 14px;
            font-size: 14px;
        }
        .back a {
            text-decoration: none;
            color: #B3261E;
        }
        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 4px;
            text-align:left;
        }
    </style>
</head>
<body>

<div class="page">
    <div class="box">
        <div class="logo">
            <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo">
        </div>
        <div class="brand">Daftar Akun</div>

        <form method="POST" action="{{ route('register.email.post') }}">
            @csrf

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $err)
                        • {{ $err }}<br>
                    @endforeach
                </div>
            @endif

            <div class="input-wrapper">
                <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" required>
            </div>

            <div class="input-wrapper">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div class="input-wrapper">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-wrapper">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            </div>

            <button type="submit" class="btn-submit">Daftar</button>
        </form>

        <div class="back">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk</a>
        </div>
    </div>
</div>

</body>
</html>