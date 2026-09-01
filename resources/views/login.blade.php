<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login | Muviku</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --glass-bg: rgba(15, 23, 42, 0.55);
            --glass-border: rgba(255, 255, 255, 0.08);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --accent-primary: #2563eb;
            --accent-hover: #1d4ed8;
            --accent-gradient: linear-gradient(135deg, #3b82f6, #1d4ed8);
            --google-bg: rgba(255, 255, 255, 0.08);
            --google-bg-hover: rgba(255, 255, 255, 0.15);
            --input-bg: rgba(15, 23, 42, 0.6);
            --input-border: rgba(255, 255, 255, 0.1);
            --input-focus: rgba(59, 130, 246, 0.5);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            user-select: none;
            width: 100vw;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.4), rgba(15, 23, 42, 0.85)), 
                        url('img/img-login.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px 32px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            animation: cardAppear 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 32px;
        }

        .logo-icon {
            height: 52px;
            width: auto;
            margin-bottom: 12px;
            transition: transform 0.3s ease;
        }

        .logo-text {
            height: 28px;
            width: auto;
            transition: opacity 0.3s ease;
        }

        .logo-container:hover .logo-icon {
            transform: scale(1.05) rotate(3deg);
        }

        .form-label {
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .fc {
            background-color: var(--input-bg) !important;
            border: 1px solid var(--input-border) !important;
            color: var(--text-primary) !important;
            font-size: 0.95rem;
            padding: 12px 16px;
            border-radius: 12px !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
        }

        .fc::placeholder {
            color: var(--text-secondary);
            opacity: 0.8;
        }

        .fc:focus {
            outline: none;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 4px var(--input-focus) !important;
            background-color: rgba(15, 23, 42, 0.85) !important;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.2s;
            z-index: 10;
        }

        .password-toggle:hover {
            color: var(--text-primary);
        }

        .btn-primary-custom {
            background: var(--accent-gradient);
            border: none;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            padding: 14px;
            border-radius: 12px;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            margin-top: 10px;
        }

        .btn-primary-custom:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
            background: linear-gradient(135deg, #4f46e5, #2563eb);
        }

        .btn-primary-custom:active:not(:disabled) {
            transform: translateY(0);
        }

        .btn-primary-custom:disabled {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.3);
            box-shadow: none;
            cursor: not-allowed;
        }

        /* Google button */
        .btn-google {
            background-color: var(--google-bg);
            border: 1px solid var(--glass-border);
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.95rem;
            padding: 12px;
            border-radius: 12px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s ease;
            margin-top: 16px;
            text-decoration: none;
        }

        .btn-google:hover {
            background-color: var(--google-bg-hover);
            border-color: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 24px 0;
            color: var(--text-secondary);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .divider:not(:empty)::before {
            margin-right: .5em;
        }

        .divider:not(:empty)::after {
            margin-left: .5em;
        }

        .footer-text {
            color: var(--text-secondary);
            font-size: 0.9rem;
            text-align: center;
            margin-top: 28px;
            margin-bottom: 0;
        }

        .footer-text a {
            color: #60a5fa;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .footer-text a:hover {
            color: #93c5fd;
            text-decoration: underline;
        }

        /* Custom Alert styling inside the card */
        .alert-custom {
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.88rem;
            font-weight: 500;
            border: 1px solid transparent;
        }

        .alert-danger-custom {
            background-color: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.25);
            color: #fca5a5;
        }

        .alert-success-custom {
            background-color: rgba(16, 185, 129, 0.15);
            border-color: rgba(16, 185, 129, 0.25);
            color: #a7f3d0;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="logo-container">
            <img src="img/logo-muviku.png" class="logo-icon" alt="Muviku Icon">
            <img src="img/muviku.png" class="logo-text" alt="Muviku Title">
        </div>

        <!-- Custom Notification Banner -->
        @if (session('error'))
            <div class="alert alert-custom alert-danger-custom d-flex align-items-center gap-2 mb-3" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-custom alert-success-custom d-flex align-items-center gap-2 mb-3" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-custom alert-danger-custom mb-3" role="alert">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <strong>Perhatian:</strong>
                </div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group-custom">
                    <input type="email" name="email" class="fc required" id="email" 
                        onkeyup="enableSubmit()" placeholder="nama@email.com" autocomplete="email">
                </div>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Sandi</label>
                <div class="input-group-custom">
                    <input type="password" name="password" class="fc required" id="password" 
                        onkeyup="enableSubmit()" placeholder="Ketik sandi anda.." autocomplete="current-password">
                    <i class="bi bi-eye password-toggle" id="togglePassword"></i>
                </div>
            </div>

            <button type="submit" class="btn-primary-custom" id="submitBtn" disabled>Masuk</button>
        </form>

        <div class="divider">atau</div>

        <!-- Google OAuth Button -->
        <a href="{{ route('google.login') }}" class="btn-google">
            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.64 9.2c0-.63-.06-1.25-.16-1.84H9v3.47h4.84c-.21 1.12-.84 2.07-1.79 2.7v2.24h2.9c1.69-1.55 2.69-3.84 2.69-6.57z" fill="#4285F4" />
                <path d="M9 18c2.43 0 4.47-.8 5.96-2.23l-2.9-2.24c-.8.54-1.84.87-3.06.87-2.35 0-4.34-1.58-5.05-3.72H.93v2.3C2.42 16.03 5.48 18 9 18z" fill="#34A853" />
                <path d="M3.95 10.68c-.18-.54-.28-1.12-.28-1.68s.1-1.14.28-1.68v-2.3H.93C.33 6.2.01 7.56.01 9s.32 2.8.92 4.02l3.02-2.34z" fill="#FBBC05" />
                <path d="M9 3.58c1.32 0 2.5.45 3.44 1.35l2.58-2.58C13.46.8 11.43 0 9 0 5.48 0 2.42 1.97.93 4.98l3.02 2.34c.71-2.14 2.7-3.72 5.05-3.72z" fill="#EA4335" />
            </svg>
            <span>Masuk dengan Google</span>
        </a>

        <p class="footer-text">
            Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
        </p>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglePassword");
        const submitBtn = document.getElementById("submitBtn");

        // Toggle password visibility
        togglePasswordButton.addEventListener("click", function() {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;
            if (type === 'text') {
                togglePasswordButton.classList.remove("bi-eye");
                togglePasswordButton.classList.add("bi-eye-slash");
            } else {
                togglePasswordButton.classList.remove("bi-eye-slash");
                togglePasswordButton.classList.add("bi-eye");
            }
        });

        // Validation helper for enable/disable submit button
        function enableSubmit() {
            const requiredFields = document.querySelectorAll('.required');
            let isValid = true;
            
            requiredFields.forEach(input => {
                if (input.value.trim() === "") {
                    isValid = false;
                }
            });
            
            submitBtn.disabled = !isValid;
        }
    </script>
</body>

</html>
