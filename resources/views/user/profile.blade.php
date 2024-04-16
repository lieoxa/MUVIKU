<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" content="#fff" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@trimble-oss/modus-icons@1.9.0/dist/modus-solid/fonts/modus-icons.css">
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
</head>

<style>
    #btn-add.disabled {
        background-color: #838383 !important;
        color: white !important;
    }

    #btn-add {
        background: #FFAE1F;
        color: white;
        /* border: white solid 1px; */
    }
</style>

<body>

    <div class="old">
        <div class="bg-img position-relative">
            <div class="bg-profile-img bg-profile">
                <img src="img/bg-profile.png" class="w-100">
            </div>
            <div class="foto-profile w-100">
                <div class="foto-nama">
                    <div class="kelas-foto w-100 mb-3">
                        <img src="img/imgProfile/profile.png" class="w-25 foto">
                    </div>
                    <h2 class="text-white text-center">Brahmana Apta Putra
                </div>
            </div>
        </div>
        <div class="container d-grid gap-3 menu">
            <div class="accordion">
                <div class="accordion-item">
                    <button class="profil accordion-button collapsed position-relative rounded-top-3" type="button"
                        data-bs-toggle="modal" data-bs-target="#profil">
                        <i class="modus-icons" aria-hidden="true">person</i>
                        Edit Profil
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                <div class="accordion-item rounded-bottom-3">
                    <button class="profil accordion-button collapsed position-relative rounded-bottom-3" type="button"
                        data-bs-toggle="modal" data-bs-target="#akun">
                        <i class="modus-icons" aria-hidden="true">email</i>
                        Edit Akun
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="accordion">
                <div class="accordion-item rounded-top-3">
                    <button onclick="window.location='{{ route('watchlist') }}'"
                        class="profil accordion-button collapsed position-relative rounded-top-3" type="button"
                        data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                        <i class="bi bi-bookmark-check-fill fs-5"></i>
                        Daftar Tonton
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                <div class="accordion-item">
                    <button class="profil accordion-button collapsed position-relative" type="button"
                        data-bs-toggle="modal" data-bs-target="#lapor">
                        <i class="modus-icons" aria-hidden="true">help</i>
                        Laporkan Kesalahan
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                <div class="accordion-item">
                    <button class="profil accordion-button collapsed position-relative" type="button"
                        data-bs-toggle="modal" data-bs-target="#password">
                        <i class="modus-icons" aria-hidden="true">key</i>
                        Edit Sandi
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                <div class="accordion-item rounded-bottom-3">
                    <button class="profil accordion-button collapsed position-relative text-danger rounded-bottom-3"
                        data-bs-toggle="modal" data-bs-target="#logout" type="button">
                        <i class="modus-icons" aria-hidden="true">sign_out</i>
                        Log Out
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="menu-wrapper fixed-bottom">
            <div class="navigation container-fluid" id="navigationn">
                <li>
                    <a class="btnn border-end-0 border-bottom-0 border-start-0">
                        <img src="img/logo-muviku.png" class="mb-1" style="width: 20%;">
                        <span>Utama</span>
                    </a>
                </li>
                <li>
                    <a class="btnn border-end-0 border-bottom-0 border-start-0">
                        <i class="bi bi-search pe-0" aria-hidden="true"></i>
                        <span>Cari</span>
                    </a>
                </li>
                <li>
                    <a class="btnn border-end-0 border-bottom-0 border-start-0">
                        <i class="bi bi-heart pe-0" aria-hidden="true"></i>
                        <span>Suka</span>
                    </a>
                </li>
                <li>
                    <a class="btnn border-end-0 border-bottom-0 border-start-0 active">
                        <img src="img/group-1.png" width="20">
                        <span style="margin-top: -4px">Profil</span>
                    </a>
                </li>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade bg-modal" id="profil" tabindex="-1" aria-labelledby="profilLabel" aria-hidden="true">
        <div class="modal-dialog container">
            <div class="modal-content edit-profil rounded-5">
                <div class="modal-body container py-0">
                    <div class="image-profil">
                        <div class="img-profil">
                            <img class="mx-auto mt-3" id="preview" src="#" alt="Preview" height="100"
                                width="100"
                                style="display: none;max-width: 100px; max-height: 100px; border-radius: 999px;" />
                        </div>
                    </div>
                    <div class="body-modal d-grid gap-3">
                        <div class="modal-dialog text-center">
                            <h1 class="modal-title fs-5" id="profilLabel">Edit Profil</h1>
                        </div>
                        <div class="nama">
                            <h6>Nama</h6>
                            <input type="text" class="w-100 rounded border txt" placeholder="Ketik nama barumu..."
                                id="nama">
                        </div>
                        <div class="img-profile">
                            <h6>Foto Profil</h6>
                            <input type="file" name="" hidden="" class="w-100 rounded border-dark"
                                onchange="previewImage()" id="imgProfil">
                            <label for="imgProfil"
                                class="bgnya-input label-upload w-100 px-2 pt-2 border rounded  text-center"
                                id="file-input-label" for="file-input"><i class="bi bi-upload"></i>Pilih File</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mx-auto border-top-0 pb-0 pt-4 justify-content-center">
                    <input type="submit" id="simpanprofil"
                        class="btn-simpan-profil btn btn-secondary text-center m-0 py-2 px-4" value="Simpan" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bg-modal text-white" id="akun" tabindex="-1" aria-labelledby="akunLabel"
        aria-hidden="true">
        <div class="modal-dialog container">
            <div class="modal-content border edit-akun rounded-5">
                <div>
                    <div class="img-pw mx-auto d-flex">
                        <img class="mx-auto" src="img/email.png" style="max-width: 25%; max-height: 25%;">
                    </div>
                </div>
                <div class="modal-dialog text-center py-2">
                    <h1 class="modal-title fs-5" id="akunLabel">Edit Akun</h1>
                </div>
                <div class="modal-body container d-grid gap-3 pt-0">
                    <div class="email">
                        <h6>Email Baru</h6>
                        <input type="email" id="email" class="w-100 rounded border txt"
                            placeholder="Ketik email barumu...">
                    </div>
                    <div class="img-profile">
                        <h6>No. Tlpn Baru</h6>
                        <input type="text" id="tlpn" class="w-100 rounded txt"
                            placeholder="Ketik no barumu...">
                    </div>
                </div>
                <div class="modal-footer mx-auto border-top-0 pb-0 pt-2">
                    <input type="submit" id="simpanakun" class="btn-simpan-profil btn btn-secondary py-1 px-4 m-0"
                        value="Simpan" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="modal bg-modal fade" id="lapor" tabindex="-1" aria-labelledby="laporLabel" aria-hidden="true">
        <div class="modal-dialog container my-auto">
            <div class="modal-content rounded-5 laporkan">
                <div>
                    <div class="img-pw mx-auto d-flex">
                        <img class="mx-auto" src="img/report.png" style="max-width: 25%; max-height: 25%;">
                    </div>
                </div>
                <div class="modal-header border-bottom-0 d-block py-3">
                    <h1 class="modal-title fs-5" id="laporLabel">Laporkan Kesalahan!</h1>
                </div>
                <div class="modal-body container py-0" style="height: 148px">
                    <textarea class="w-100 px-1" cols="30" rows="6" placeholder="Tuliskan laporan Anda di sini..."
                        style="text-indent: 5px"></textarea>
                </div>
                <div class="modal-footer border-top-0 justify-content-center p-0 pt-3">
                    <button type="button m-0" class="btn bg-secondary text-white btn-simpan py-2 px-4"
                        data-bs-dismiss="modal" style="width: 104.25px">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bg-modal px-3" id="password" tabindex="-1" aria-labelledby="passwordLabel"
        aria-hidden="true">
        <div class="modal-dialog text-center py-3 my-0" role="document">
            <div class="modal-content pw edit-pw rounded-5" role="document" x-data="{ pwlama: '', pwbaru: '', confirmpw: '' }">
                <div class="img-lock">
                    <div class="img-pw mx-auto d-flex">
                        <img class="mx-auto" src="img/lock.png" style="max-width: 25%; max-height: 25%;">
                    </div>
                </div>
                <h1 class="modal-title fs-5" id="passwordLabel">Ubah Kata Sandi</h1>
                <div class="modal-body container d-grid gap-3 py-0">
                    <div class="pw-lama position-relative">
                        <h6>Kata Sandi Lama</h6>
                        <input type="password" name="" x-model="pwlama"
                            class="w-100 rounded border txt"
                            placeholder="Ketik kata sandi lamamu...">
                        <i class="bi-eye position-absolute icon-eye-pw" style="font-size: 24px; right: 13px;"
                            id="togglepwLama"></i>
                    </div>
                    <div class="pw-baru position-relative">
                        <h6>Kata Sandi Baru</h6>
                        <input type="password" name="" x-model="pwbaru"
                            class="w-100 rounded border txt"
                            placeholder="Ketik kata sandi barumu...">
                        <i class="bi-eye position-absolute icon-eye-pw" style="font-size: 24px; right: 13px;"
                            id="togglepwBaru"></i>
                    </div>
                    <div class="confirm-pw position-relative">
                        <h6>Konfirmasi kata Sandi Baru</h6>
                        <input type="password" name="" x-model="confirmpw"
                            class="w-100 rounded border txt"
                            placeholder="Ketik ulang kata sandi barumu...">
                        <i class="bi-eye position-absolute icon-eye-pw" style="font-size: 24px; right: 13px;"
                            id="togglepwConfirm"></i>
                        <p class="mb-0 mt-1">Lupa kata sandi? <span class="text-warning"><i>Klik disini</i></span></p>
                    </div>
                </div>
                <div class="modal-footer mx-auto border-top-0 d-flex text-center pb-0 pt-4 gap-2">
                    <button type="button" class="btn btn-simpan border py-2" style="width: 104.25px"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="btn-add" class="btn btn-simpan px-4"
                        :class="pwlama && pwbaru && confirmpw ? null : 'disabled'">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal bg-modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel"
        aria-hidden="true">
        <div class="modal-dialog container">
            <div class="modal-content logout rounded-5">
                <div class="img-lock">
                    <div class="img-pw mx-auto d-flex">
                        <img class="mx-auto" src="img/img-logout.png" style="max-width: 25%; max-height: 25%;">
                    </div>
                </div>
                <div class="modal-header border-bottom-0 text-center d-block pb-0">
                    <h1 class="modal-title fs-5" id="logoutLabel">Anda Yakin Ingin Keluar?</h1>
                </div>
                <div class="modal-footer border-top-0 justify-content-center gap-2">
                    <button type="button" class="btn bg-secondary text-white px-3 py-2" data-bs-dismiss="modal"
                        style="width: 72.53px">Iya</button>
                    <button type="button" class="btn btn-danger py-2 px-3" data-bs-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function checkInputs() {
            var namaInput = document.getElementById('nama');
            var imgProfilInput = document.getElementById('imgProfil');
            var simpanButton = document.getElementById('simpanprofil');

            if (namaInput.value.trim() !== '' || imgProfilInput.value.trim() !== '') {
                simpanButton.removeAttribute('disabled');
                simpanButton.classList.remove('btn-secondary');
                simpanButton.classList.add('btn-primary');
            } else {
                simpanButton.setAttribute('disabled', 'disabled');
                simpanButton.classList.remove('btn-primary');
                simpanButton.classList.add('btn-secondary');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var namaInput = document.getElementById('nama');
            var imgProfilInput = document.getElementById('imgProfil');

            namaInput.addEventListener('input', checkInputs);
            imgProfilInput.addEventListener('change', checkInputs);
        });

        function previewImage() {
            var preview = document.getElementById('preview');
            var imgProfilInput = document.getElementById('imgProfil');
            var file = imgProfilInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
            }
        }
    </script>
</body>


<script>
    function checkInputs() {
        var emailInput = document.getElementById('email');
        var tlpnInput = document.getElementById('tlpn');
        var simpanButton = document.getElementById('simpanakun');

        if (emailInput.value.trim() !== '' || tlpnInput.value.trim() !== '') {
            simpanButton.removeAttribute('disabled');
            simpanButton.classList.remove('btn-secondary');
            simpanButton.classList.add('btn-primary');
        } else {
            simpanButton.setAttribute('disabled', 'disabled');
            simpanButton.classList.remove('btn-primary');
            simpanButton.classList.add('btn-secondary');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var emailInput = document.getElementById('email');
        var tlpnInput = document.getElementById('tlpn');

        emailInput.addEventListener('input', checkInputs);
        tlpnInput.addEventListener('input', checkInputs);
    });
</script>

<script>
    const InputPwLama = document.getElementById("pwlama");
    const togglePwLama = document.getElementById("togglepwLama");

    togglePwLama.addEventListener("click", function() {
        const type = InputPwLama.type === "password" ? "text" : "password";
        InputPwLama.type = type;
        if (type == 'text') {
            togglePwLama.classList.remove("bi-eye");
            togglePwLama.classList.add("bi-eye-fill");
        } else {
            togglePwLama.classList.add("bi-eye");
            togglePwLama.classList.remove("bi-eye-fill");
        }
    });
</script>
<script>
    const InputPwBaru = document.getElementById("pwbaru");
    const togglePwBaru = document.getElementById("togglepwBaru");

    togglePwBaru.addEventListener("click", function() {
        const type = InputPwBaru.type === "password" ? "text" : "password";
        InputPwBaru.type = type;
        if (type == 'text') {
            togglePwBaru.classList.remove("bi-eye");
            togglePwBaru.classList.add("bi-eye-fill");
        } else {
            togglePwBaru.classList.add("bi-eye");
            togglePwBaru.classList.remove("bi-eye-fill");
        }
    });
</script>
<script>
    const InputPwConfirm = document.getElementById("confirmpw");
    const toggleConfirmPw = document.getElementById("togglepwConfirm");

    toggleConfirmPw.addEventListener("click", function() {
        const type = InputPwConfirm.type === "password" ? "text" : "password";
        InputPwConfirm.type = type;
        if (type == 'text') {
            toggleConfirmPw.classList.remove("bi-eye");
            toggleConfirmPw.classList.add("bi-eye-fill");
        } else {
            toggleConfirmPw.classList.add("bi-eye");
            toggleConfirmPw.classList.remove("bi-eye-fill");
        }
    });
</script>
<script>
    function previewImage() {
        var imgProfil = document.getElementById('imgProfil');
        var preview = document.getElementById('preview');

        if (imgProfil.files && imgProfil.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(imgProfil.files[0]);
        }
    }
</script>
<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>
<script>
    const optionMenu = document.querySelector(".select-menu"),
        selectBtn = optionMenu.querySelector(".select-btn"),
        options = optionMenu.querySelectorAll(".option"),
        sBtn_text = optionMenu.querySelector(".sBtn-text");
    selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));
    options.forEach(option => {
        option.addEventListener("click", () => {
            let selectedOption = option.querySelector(".option-text").innerText;
            sBtn_text.innerText = selectedOption;
            optionMenu.classList.remove("active");
        });
    });
</script>
<script>
    document.getElementById('simpan').addEventListener('click', function() {
        let timerInterval;
        Swal.fire({
            text: "Harap cek kembali!",
            width: '15em',
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
    });
</script>

</html>
