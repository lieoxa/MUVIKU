<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
    body {
        user-select: none;
        width: 100vw;
        overflow: hidden;
        background: url('img/img-login.png') no-repeat center center fixed;
        /* Ganti 'path/to/your/image.jpg' dengan path atau URL gambar pemandangan Anda */
        background-size: cover;
        /* Menutupi seluruh elemen dengan gambar */
        height: 100vh;
    }

    .mt-6 {
        margin-top: 100px;
    }

    .card {
        background: rgba(255, 255, 255, 0.8);
        /* Latar belakang card dengan efek transparan */
        border-radius: 10px;
        /* Sudut card yang membulat */
        backdrop-filter: blur(1px);
        /* Efek blur pada latar belakang card */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Bayangan lembut */
    }

    .text-indah {
        color: #ffffff;
        /* Warna teks */
        font-size: 15px;
        /* Ukuran teks */
        margin-top: 9rem;
        /* Jarak atas */
    }

    .text-indah a {
        transition: color 0.3s;
        /* Animasi perubahan warna tautan */
    }

    .text-indah a:hover {
        color: #0056b3;
        /* Warna tautan saat dihover */
    }

    .fc {
        background-color: #e7e7e7b6;
    }

    input::placeholder,
    input {
        /* color: #000000 !important; */
        text-indent: 5px;
    }

    .password-input::placeholder,
    .password-input {
        text-indent: 5px;
    }

    .tombol {
        background-color: #ffffff;
        color: #000000;
    }

    input[type=submit]:disabled {
        color: rgba(255, 255, 255, 0.541);
        background-color: #8181815d;
    }
</style>

<body>
    <div class="container">
        <div class="justify-content-center mt-5">
            <div class="row col-lg-4">
                <div class="dalam">
                    <div class="col-12">
                        <div class="logo mt-5">
                            <img src="img/logo-muviku.png" class="logo-img w-25 mx-auto d-block mb-3">
                            <img src="img/muviku.png" class="logo-img w-50 mx-auto d-block">
                        </div>
                    </div>
                    <div class="ayam mt-5">
                        <div class="card-body">
                            @if ($errors->any())
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        alert("{{ implode('\n', $errors->all()) }}");
                                    });
                                </script>
                            @endif
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3 col-10 mx-auto">
                                    <label for="email" class="form-label text-white fw-bold">Email</label>
                                    <input type="email" name="email" class="fc form-control rounded-pill required"
                                        style="border: none" id="email" onkeyup="enableSubmit()"
                                        placeholder="Ketik email anda..">
                                </div>
                                <div class="mb-1 col-10 mx-auto position-relative">
                                    <label for="password" class="form-label text-white fw-bold">Sandi</label>
                                    <input type="password" name="password"
                                        class="fc form-control rounded-pill required password-input"
                                        style="border: none" id="password" onkeyup="enableSubmit()"
                                        placeholder="Ketik sandi anda..">
                                    <i class="bi-eye position-absolute" id="togglePassword"
                                        style="font-size: 24px; right: 13px; top: 48%; cursor: pointer;"></i>
                                </div>
                                <div class="mb-1 mt-4">
                                    <div class="d-grid col-5 mx-auto">
                                        <input type="submit" class="btn btn-dark mx-auto px-5"
                                            style="border-radius: 50px; margin-top: 20px;" value="Masuk" disabled>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center text-indah daftar">Belum punya akun? <a href="{{ route('register') }}"
                                    class="fw-bold"> Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script>
    const input = document.getElementById('email');

    input.addEventListener('input', event => {
        if (input.value === '') {
            input.style.backgroundColor = '';
        } else {
            input.style.backgroundColor = 'white';
        }
    });

    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.getElementById("togglePassword");

    passwordInput.addEventListener('input', event => {
        if (passwordInput.value === '') {
            passwordInput.style.backgroundColor = '';
        } else {
            passwordInput.style.backgroundColor = 'white';
        }
    });

    togglePasswordButton.addEventListener("click", function() {
        const type = passwordInput.type === "password" ? "text" : "password";
        passwordInput.type = type;
        if (type == 'text') {
            togglePasswordButton.classList.remove("bi-eye");
            togglePasswordButton.classList.add("bi-eye-fill");
        } else {
            togglePasswordButton.classList.add("bi-eye");
            togglePasswordButton.classList.remove("bi-eye-fill");
        }
    });
</script>

<script>
    function enableSubmit() {
        let inputs = document.getElementsByClassName('required');
        let btn = document.querySelector('input[type="submit"]');
        let isValid = true;
        for (var i = 0; i < inputs.length; i++) {
            let changedInput = inputs[i];
            if (changedInput.value.trim() === "" || changedInput.value === null) {
                changedInput.classList.remove("disabled");
                isValid = false;
                break;
            }
        }
        btn.disabled = !isValid;
    }
</script>


</html>
