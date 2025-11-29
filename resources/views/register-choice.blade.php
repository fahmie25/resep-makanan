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

        /* BACK BUTTON */
        .back {
            position: absolute;
            top: 28px;
            left: 28px;
            padding: 10px 18px;
            border-radius: 999px;
            background-color: #ffffff;
            border: 1px solid #f0d9c7;
            color: #B3261E;
            text-decoration: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .back:hover {
            background: #fbeee5;
        }

        /* WRAPPER SAMA SEPERTI LOGIN */
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-box {
            text-align: center;
        }

        .auth-logo img {
            width: 150px;
            margin-bottom: 10px;
        }

        .auth-title {
            font-size: 28px;
            color: #B3261E;
            font-family: 'Playfair Display', serif;
            margin-bottom: 32px;
        }

        .auth-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 360px;
            padding: 13px 5px;
            margin: 10px auto;
            border-radius: 45px;
            background: #ffffff;
            border: 1px solid #e1c9b3;
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: 0.2s;
        }

        .auth-btn:hover {
            background-color: #f8efe7;
        }

        .btn-icon {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-icon img {
            width: 100%;
            height: 100%;
        }

        .btn-icon-email svg {
            width: 22px;
            height: 22px;
        }
    </style>
</head>

<body>

    <!-- tombol kembali -->
    <a href="{{ route('login') }}" class="back">← Kembali</a>

    <div class="auth-wrapper">
        <div class="auth-box">

            <div class="auth-logo">
                <img src="{{ asset('storage/images/logo.jpg') }}" alt="Rasa Nusantara">
            </div>

            <div class="auth-title">Daftar atau Masuk</div>

            {{-- GOOGLE --}}
            <a href="{{ route('google.redirect') }}" class="auth-btn">
                <span class="btn-icon">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                </span>
                Lanjutkan Dengan Google
            </a>

            {{-- EMAIL (pakai SVG inline, tidak pakai img lagi) --}}
            <a href="{{ route('register.email') }}" class="auth-btn">
                <span class="btn-icon btn-icon-email">
                    <svg viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="14" rx="2" ry="2"
                              stroke="#B3261E" stroke-width="1.8"/>
                        <path d="M4 7L12 12.5L20 7"
                              stroke="#B3261E" stroke-width="1.8"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                Lanjutkan Dengan Email
            </a>

        </div>
    </div>

</body>
</html>
