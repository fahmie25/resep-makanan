<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Rasa Nusantara</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        /* --- ANIMASI FLOATING SOFT --- */
        @keyframes floatSoft {
            0% {
                transform: translateY(0);
                filter: drop-shadow(0px 15px 28px rgba(0,0,0,0.28));
            }
            50% {
                transform: translateY(-4px);
                filter: drop-shadow(0px 18px 32px rgba(0,0,0,0.32));
            }
            100% {
                transform: translateY(0);
                filter: drop-shadow(0px 15px 28px rgba(0,0,0,0.28));
            }
        }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #F8F1E3;
        }

        .page {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* ======================
           KIRI (GAMBAR MAKANAN)
        ======================= */
        .left {
            flex: 1;
            position: relative;
        }

        /* foto atas */
        .img-top {
            position: absolute;
            top: 20px;
            left: 30px;
            width: 220px;
            animation: floatSoft 4s ease-in-out infinite;
        }

        /* foto bawah */
        .img-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 460px;
            animation: floatSoft 4.5s ease-in-out infinite;
        }

        /* ======================
           KANAN (FORM LOGIN)
        ======================= */
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* tombol kembali */
        .back-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            padding: 8px 16px;
            border-radius: 999px;
            background: #fff;
            border: 1px solid #e8d7c8;
            color: #B3261E;
            font-size: 15px;
            text-decoration: none;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #f7ede5;
        }

        .login-box {
            width: 70%;
            max-width: 420px;
            text-align: center;
        }

        .logo img {
            width: 140px;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            color: #B3261E;
            margin: 10px 0 34px;
        }

        /* kotak input */
        .input-wrapper {
            background: #E3DFDA;
            border-radius: 999px;
            padding: 12px 20px;
            margin-bottom: 16px;
        }

        .input-wrapper input {
            width: 100%;
            border: none;
            background: transparent;
            font-size: 16px;
            outline: none;
        }

        /* tombol login */
        .btn-submit {
            width: 60%;
            padding: 12px 0;
            margin-top: 18px;
            border-radius: 999px;
            border: none;
            background: #B3261E;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-submit:hover {
            background: #8d1e18;
        }

        .no-account {
            margin-top: 14px;
            font-size: 14px;
        }

        .no-account a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>

<body>

<div class="page">

    <!-- KIRI GAMBAR -->
    <div class="left">
        <img src="{{ asset('storage/images/fotologin1.jpg') }}" class="img-top" alt="foto atas">
        <img src="{{ asset('storage/images/fotologin2.jpg') }}" class="img-bottom" alt="foto bawah">
    </div>

    <!-- KANAN FORM -->
    <div class="right">

        <a href="{{ route('register.choice') }}" class="back-btn">← Kembali</a>

        <div class="login-box">

            <div class="logo">
                <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo">
            </div>

            <div class="brand">Rasa Nusantara</div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-wrapper">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button class="btn-submit">Login</button>

                <div class="no-account">
                    <a href="{{ route('register.choice') }}">Don't have account?</a>
                </div>

            </form>
        </div>
    </div>

</div>

</body>
</html>
