<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Rasa Nusantara</title>

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
        }

        /* Kiri gambar makanan */
        .left {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .left-top {
            position: absolute;
            top: 20px;
            left: 40px;
            width: 200px;
        }

        .left-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 420px;
        }

        .left img {
            width: 100%;
            display: block;
        }

        /* Kanan form */
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #F8F1E3;
            position: relative;
        }

        .login-box {
            width: 70%;
            max-width: 420px;
            text-align: center;
        }

        .logo img {
            width: 130px;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #B3261E;
            margin: 10px 0 30px;
        }

        .form-group {
            margin-bottom: 18px;
            text-align: left;
        }

        .input-wrapper {
            background-color: #E3DFDA;
            border-radius: 999px;
            padding: 10px 18px;
        }

        .input-wrapper input {
            border: none;
            outline: none;
            width: 100%;
            background: transparent;
            font-size: 16px;
        }

        .btn-submit {
            width: 60%;
            margin-top: 15px;
            padding: 10px 0;
            border-radius: 999px;
            border: none;
            background-color: #B3261E;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .no-account {
            margin-top: 14px;
            font-size: 13px;
        }

        .back-arrow {
            position: absolute;
            top: 18px;
            right: 24px;
            font-size: 20px;
        }

        .back-arrow a {
            text-decoration: none;
            color: #B3261E;
        }
    </style>
</head>
<body>

<div class="page">

    {{-- kiri gambar, ganti nama file sesuai gambar kamu --}}
    <div class="left">
        <img class="left-top" src="{{ asset('storage/images/login-top.png') }}" alt="Makanan atas">
        <img class="left-bottom" src="{{ asset('storage/images/login-bottom.png') }}" alt="Makanan bawah">
    </div>

    {{-- kanan form --}}
    <div class="right">
        <div class="back-arrow">
            <a href="{{ route('home') }}">←</a>
        </div>

        <div class="login-box">
            <div class="logo">
                <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo">
            </div>
            <div class="brand">Rasa Nusantara</div>

            @if (session('status'))
                <p>{{ session('status') }}</p>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Login</button>

                <div class="no-account">
                    <a href="{{ route('register.choice') }}" style="text-decoration:none; color:#000;">
                        Don't have account?
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>
