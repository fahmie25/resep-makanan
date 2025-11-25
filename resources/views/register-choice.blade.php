<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar atau Masuk</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #F8F1E3;
            font-family: 'Nunito', sans-serif;
        }

        .container {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: space-between;
            padding: 40px;
        }

        .left img {
            width: 430px;
        }

        .right {
            width: 45%;
            text-align: center;
        }

        .logo img {
            width: 140px;
        }

        h2 {
            font-size: 28px;
            margin: 20px 0;
            color: #B3261E;
            font-family: 'Playfair Display', serif;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 320px;
            margin: 10px auto;
            padding: 12px;
            border-radius: 40px;
            background: #fff;
            border: 1px solid #ccc;
            cursor: pointer;
            font-size: 16px;
        }

        .btn img {
            width: 22px;
            margin-right: 10px;
        }

        .back {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 20px;
            color: #B3261E;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <a href="{{ route('login') }}" class="back">←</a>

    <div class="container">
        <div class="left">
            <img src="{{ asset('storage/images/register-illustration.png') }}" alt="">
        </div>

        <div class="right">
            <div class="logo">
                <img src="{{ asset('storage/images/logo.jpg') }}">
            </div>

            <h2>Daftar atau Masuk</h2>

            <a href="{{ route('google.redirect') }}" class="btn">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg">
                Lanjutkan Dengan Google
            </a>

            <a href="{{ route('register.email') }}" class="btn">
                <img src="https://www.svgrepo.com/show/532537/mail.svg">
                Lanjutkan Dengan Email
            </a>
        </div>
    </div>

</body>
</html>