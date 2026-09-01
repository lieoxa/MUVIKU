    <!DOCTYPE html>
    <html lang="en">
    <style>
        .logo-muviku {
            position: absolute;
            top: 4%;
            left: 2%;
        }

        .logo-muviku img {
            max-width: 180px;
            max-height: 100px;
            filter: drop-shadow(5px 5px 5px #000000);
        }

        .input100 {
            padding: 0 38px 0 38px;
        }

        .input100:focus {
            padding-right: 6px !important;
        }
    </style>
    {{-- AKUN ADMIN --}}
    {{-- EMAIL : Adriel Felix
PASSWORD : admin --}}

    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/logo-muviku.png" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!--===============================================================================================-->
    </head>

    <body>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/bg-profile.png'); position: relative;">
                <div class="logo-muviku">
                    <img src="img/muviku.png">
                </div>
                <div class="wrap-login100">
                    <form action="/adminlog" method="POST" class="login100-form validate-form"
                        enctype="multipart/form-data">
                        @csrf
                        <span class="login100-form-logo">
                            <img src="img/logo-muviku.png" height="60" width="60">
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
                            admin
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="name" placeholder="Nama">
                            <span class="focus-input100" data-placeholder="&#xF4DA;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" id="password"
                                placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xF47A;"></span>
                            <i class="bi-eye position-absolute text-white" id="togglePassword"
                                style="font-size: 24px; right: 10px; top: 18%; cursor: pointer; line-height: 1.2;"></i>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

        <script>
            const passwordInput = document.getElementById("password");
            const togglePasswordButton = document.getElementById("togglePassword");

            passwordInput.addEventListener('input', event => {
                if (passwordInput.value === '') {
                    passwordInput.style.backgroundColor = '';
                } else {
                    passwordInput.style.backgroundColor = 'transparent';
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

        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>

    </html>
