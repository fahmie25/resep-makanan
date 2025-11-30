<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar atau Masuk - Rasa Nusantara</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Nunito&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #F8F1E3;
            font-family: 'Nunito', sans-serif;
        }

        /* ======================
           ANIMASI FLOATING SOFT
        ======================= */
        @keyframes floatSoft {
            0% {
                transform: translateY(0);
                filter: drop-shadow(0px 12px 24px rgba(0,0,0,0.20));
            }
            50% {
                transform: translateY(-4px);
                filter: drop-shadow(0px 16px 30px rgba(0,0,0,0.26));
            }
            100% {
                transform: translateY(0);
                filter: drop-shadow(0px 12px 24px rgba(0,0,0,0.20));
            }
        }

        /* ======================
           TOMBOL KEMBALI
        ======================= */
        .back {
            position: absolute;
            top: 28px;
            left: 28px;
            padding: 10px 18px;
            border-radius: 999px;
            background-color: #ffffff;
            border: 1px solid #f0d9c7;
            color: #B3261E;
            font-size: 15px;
            text-decoration: none;
            transition: 0.2s;
            z-index: 20;
        }

        .back:hover {
            background-color: #fbeee5;
        }

        /* ======================
           LAPISAN FOTO DEKORASI
        ======================= */
        .decor-img {
            position: fixed;   /* biar nempel di layar */
            pointer-events: none;
            z-index: 1;
        }

        .img-left-top {
            top: 40px;
            left: 40px;
            width: 220px;
            animation: floatSoft 5s ease-in-out infinite;
        }

        .img-left-bottom {
            bottom: -10px;
            left: 0;
            width: 320px;
            animation: floatSoft 4.5s ease-in-out infinite;
        }

        .img-right-top {
            top: 40px;
            right: 40px;
            width: 220px;
            animation: floatSoft 5.2s ease-in-out infinite;
        }

        .img-right-bottom {
            bottom: -10px;
            right: 0;
            width: 320px;
            animation: floatSoft 4.8s ease-in-out infinite;
        }

        /* ======================
           WRAPPER UTAMA
        ======================= */
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            z-index: 5; /* di atas foto dekorasi */
        }

        .auth-box {
            text-align: center;
        }

        .auth-logo img {
            width: 150px;
            margin-bottom: 12px;
        }

        .auth-title {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #B3261E;
            margin-bottom: 32px;
        }

        /* ======================
           TOMBOL PILIHAN
        ======================= */
        .auth-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 360px;
            padding: 13px 5px;
            margin: 10px auto;
            border-radius: 45px;
            background-color: #ffffff;
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

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .img-left-top,
            .img-right-top {
                width: 160px;
            }
            .img-left-bottom,
            .img-right-bottom {
                width: 240px;
            }
        }

        @media (max-width: 700px) {
            .img-left-top,
            .img-right-top {
                display: none;
            }
            .img-left-bottom,
            .img-right-bottom {
                opacity: 0.55;
            }
        }
    </style>
</head>

<body>

    <!-- Tombol Kembali -->
    <a href="{{ route('login') }}" class="back">← Kembali</a>

    <!-- FOTO-FOTO DEKORASI FLOATING -->
    <img src="{{ asset('storage/images/fotologin3.jpg') }}" class="decor-img img-left-top" alt="Dekor kiri atas">
    <img src="{{ asset('storage/images/fotologin4.jpg') }}" class="decor-img img-left-bottom" alt="Dekor kiri bawah">
    <img src="{{ asset('storage/images/fotologin5.jpg') }}" class="decor-img img-right-top" alt="Dekor kanan atas">
    <img src="{{ asset('storage/images/fotologin6.jpg') }}" class="decor-img img-right-bottom" alt="Dekor kanan bawah">

    <!-- Konten Utama -->
    <div class="auth-wrapper">
        <div class="auth-box">

            <!-- Logo -->
            <div class="auth-logo">
                <img src="{{ asset('storage/images/logo.jpg') }}" alt="Rasa Nusantara">
            </div>

            <!-- Judul -->
            <div class="auth-title">Daftar atau Masuk</div>

            <!-- GOOGLE -->
            <a href="{{ route('google.redirect') }}" class="auth-btn">
                <span class="btn-icon">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                </span>
                Lanjutkan Dengan Google
            </a>

            <!-- EMAIL -->
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
