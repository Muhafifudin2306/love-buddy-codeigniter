<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/style'); ?>
    <title>LoveBuddy.id</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
</head>

<body>
    <?php if ($this->session->flashdata('success')) { ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                icon: 'success',
                title: '<?php echo $this->session->flashdata('success'); ?>',
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: 'error',
                title: '<?php echo $this->session->flashdata('error'); ?>',
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        </script>
    <?php } ?>
    <!-- Navbar start -->
    <?php $this->load->view('layout/navbar'); ?>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero vh-100" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="title-shadow fw-bold text-white text-shadow">Konseling dengan
                        Konselor terbaik yang ahli
                        dalam
                        <span class="fs-1 title-shadow text-first fw-bold">Hubungan Asmara</span>
                    </h1>
                    <p class="fs-5">your personal guide to happier love life</p>
                    <!-- <a target="_blank"
                        href="http://wa.me/6282329053400?text=Hai%20Buddy,%20aku%20mau%20konseling%20nih!"> -->

                    <!-- </a> -->
                    <?php if ($is_login) { ?>
                        <button class="btn btn-danger px-4 border-0 fs-7 py-3 rounded-5 bg-first" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Jadwalkan Konsultasimu</button>
                    <?php } else { ?>
                        <button id="check-account-btn" class="btn btn-danger px-4 border-0 fs-7 py-3 rounded-5 bg-first">
                            Jadwalkan Konsultasimu</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-5">
                <div class="modal-body bg-two rounded-5 p-4">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close p-2 bg-white rounded-circle" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 py-4">
                            <h4 class="fw-bold text-center mb-3">Konseling Voice Call</h4>
                            <h6 class="fw-thin text-center mb-3">By Whatsapp</h6>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-danger px-5 py-2 bg-first border-0 rounded-5">Jadwalkan
                                    Konsultasi</button>
                            </div>
                        </div>
                        <div class="col-sm-2 p-4 d-flex justify-content-center">
                            <div class="bgr-first w-25 h-100 rounded-5">
                            </div>
                        </div>
                        <div class="col-sm-5 py-4">
                            <h4 class="fw-bold text-center mb-3">Konseling Video Call</h4>
                            <h6 class="fw-thin text-center mb-3">By Google Meet</h6>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-secondary px-5 py-2 border-0 rounded-5">Coming
                                    Soon</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section start -->
    <section id="about" class="about py-5">
        <div class="container">
            <h2 class="fw-bold text-center text-first mt-5 py-5" data-aos="zoom-in" data-aos-duration="1000">Tentang
                <span class="text-black">Kami</span>
            </h2>
            <div class="row mt-5">
                <div class="col-md-5" data-aos="zoom-in" data-aos-duration="1000">
                    <img class="w-100"
                        src="https://img.freepik.com/free-vector/love-illustration-concept_114360-867.jpg?size=626&ext=jpg&ga=GA1.1.620035632.1680358173&semt=robertav1_2_sidr"
                        alt="Tentang Kami" />
                </div>
                <div class="col-md-7" data-aos="zoom-in" data-aos-duration="1300">
                    <div class="content">
                        <p class="fs-4 py-2 fw-bold">Apa itu LoveBuddy?</p>
                        <p class="fw-light fs-7" align="justify">
                            LoveBuddy adalah Startup digital yang didedikasikan untuk
                            membantu individu dalam menavigasi dunia
                            asmara dan mengatasi permasalahan dalam hubungan. Kami
                            menyediakan layanan konsultasi online dengan
                            konselor profesional yang
                            berkualitas, serta membangun komunitas forum untuk membantu
                            individu dalam berbagai pengalaman dan
                            saran dari orang-orang yang sama-sama mengalami permasalahan
                            dalam hubungan.
                        </p>
                        <p class="fw-light fs-7" align="justify">
                            Selain itu, LoveBuddy juga menyediakan webinar dan konten
                            mengenai asmara yang berkualitas tinggi,
                            yang dirancang untuk membantu individu dalam memahami dan
                            memperkuat hubungan mereka. Kami
                            berkomitmen untuk memberikan
                            pengalaman pengguna yang terbaik dan memastikan setiap
                            individu merasa didengar, dipahami, dan
                            didukung dalam perjalanan mereka untuk mencapai hubungan
                            yang sehat dan bahagia.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- About Section end -->

    <!-- Layanan Section start -->
    <section id="service" class="service py-5">
        <div class="container">
            <h2 class="fw-bold text-center text-first mt-5 py-5" data-aos="zoom-in" data-aos-duration="1000">Layanan
                <span class="text-black">Kami</span>
            </h2>
            <div class="row">
                <div class="col-lg-3 col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="image-service">
                        <a href="#">
                            <img class="w-100 p-4"
                                src="https://img.freepik.com/free-vector/strategic-consulting-concept-illustration_114360-8994.jpg?size=626&ext=jpg&uid=R72551851&ga=GA1.2.620035632.1680358173" />
                        </a>
                    </div>
                    <div class="service-content">
                        <h6 class="menu-card-title fw-bold text-center">Konsultasi</h6>
                        <p class="menu-card-price text-center">Obat</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="image-service">
                        <a href="#">
                            <img class="w-100 p-4"
                                src="https://img.freepik.com/free-vector/work-progress-concept-illustration_114360-5241.jpg?size=626&ext=jpg&uid=R72551851&ga=GA1.2.620035632.1680358173" />
                        </a>
                    </div>
                    <div class="service-content">
                        <h6 class="menu-card-title fw-bold text-center">Webinar</h6>
                        <p class="menu-card-price text-center">Vitamin&Antibiotik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="image-service">
                        <img src="https://img.freepik.com/free-vector/mobile-marketing-concept-illustration_114360-1497.jpg?size=626&ext=jpg&uid=R72551851&ga=GA1.2.620035632.1680358173"
                            alt="Espresso" class="menu-card-img w-100 p-4" />

                    </div>
                    <div class="service-content">
                        <h6 class="menu-card-title fw-bold text-center">Forum Komunitas</h6>
                        <p class="menu-card-price text-center">Vitamin&Antibiotik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="image-service">
                        <a href="#">
                            <img class="w-100 p-4"
                                src="https://img.freepik.com/free-vector/instant-information-concept-illustration_114360-5264.jpg?size=626&ext=jpg&uid=R72551851&ga=GA1.1.620035632.1680358173" />
                        </a>
                    </div>
                    <div class="service-content">
                        <h6 class="menu-card-title fw-bold text-center">Konsultasi</h6>
                        <p class="menu-card-price text-center">Obat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Menu Section end -->

    <!-- Products Section start -->
    <section class="products py-5" id="product">
        <div class="container">
            <h2 class="fw-bold text-center text-first mt-5 py-5" data-aos="zoom-in" data-aos-duration="1000">Langkah
                <span class="text-black">Konsultasi</span>
            </h2>
            <div class="row">
                <div class="col-md-6 pb-4" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="p-5 border-first w-100">
                        <div class="product-icons d-flex justify-content-center my-2">
                            <a class="fs-4 p-2 px-3 text-first bg-transparent border-first rounded-circle" href="#"><i
                                    data-feather="log-in"></i></a>
                        </div>
                        <div class="product-image d-flex justify-content-center">
                            <img class="w-50"
                                src="https://img.freepik.com/free-vector/select-house-concept-illustration_114360-4395.jpg?size=626&ext=jpg&uid=R72551851&ga=GA1.1.620035632.1680358173"
                                alt="Product 1" />
                        </div>
                        <div class="product-content">
                            <h5 class="text-center fw-bold py-2">Login Aplikasi</h5>
                            <p class="text-center fw-light fs-7">Buat akunmu di LoveBuddy dan jadilah bagian dari
                                keluarga
                                besar kami!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4" data-aos="zoom-in" data-aos-duration="1400">
                    <div class="p-5 border-first w-100">
                        <div class="product-icons d-flex justify-content-center my-2">
                            <a class="fs-4 p-2 px-3 text-first bg-transparent border-first rounded-circle" href="#"><i
                                    data-feather="filter"></i>
                            </a>
                        </div>
                        <div class="product-image d-flex justify-content-center">
                            <img class="w-50"
                                src="https://img.freepik.com/free-vector/curiosity-people-concept-illustration_114360-11034.jpg?size=626&ext=jpg&uid=R72551851&ga=GA1.1.620035632.1680358173"
                                alt="Product 1" />
                        </div>
                        <div class="product-content">
                            <h5 class="text-center fw-bold py-2">Pilih Konselor Tepat</h5>
                            <p class="text-center fw-light fs-7">Buat akunmu di LoveBuddy dan jadilah bagian dari
                                keluarga
                                besar kami!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4" data-aos="zoom-in" data-aos-duration="1600">
                    <div class="p-5 border-first w-100">
                        <div class="product-icons d-flex justify-content-center my-2">
                            <a class="fs-4 p-2 px-3 text-first bg-transparent border-first rounded-circle" href="#"><i
                                    data-feather="calendar"></i>
                            </a>
                        </div>
                        <div class="product-image d-flex justify-content-center">
                            <img class="w-50"
                                src="https://img.freepik.com/free-vector/select-house-concept-illustration_114360-4395.jpg?size=626&ext=jpg&uid=R72551851&ga=GA1.1.620035632.1680358173"
                                alt="Product 1" />
                        </div>
                        <div class="product-content">
                            <h5 class="text-center fw-bold py-2">Jadwalkan Konsultasimu</h5>
                            <p class="text-center fw-light fs-7">Cocokkan jadwal ketersediaan kamu dengan konselor
                                LoveBuddy dan bersiaplah untuk konseling!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Products Section end -->

    <!-- Contact Section start -->
    <section id="contact" class="contact py-5">
        <div class="container">
            <h2 class="fw-bold text-center text-first mt-5 py-5" data-aos="zoom-in" data-aos-duration="1000">Kontak
                <span class="text-black">Kami</span>
            </h2>

            <div class="bg-white border shadow" data-aos="zoom-in" data-aos-duration="1300">
                <div class="p-5">
                    <p class="text-center fs-5">Saran dan kritik kalian sangat berarti untuk, <span
                            class="text-first fst-italic fw-bold">LoveBuddy</span> </p>
                    <form action="<?= base_url('front/save_feedback') ?>" method="post" class="pt-4">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" placeholder="Nama Lengkap" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" placeholder="example@example.com" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="telephone" placeholder="+62xx-xxx-xx-xxx" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" name="message" rows="7" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger bg-first border-0 rounded fs-7 w-100 py-2">Kirim
                            Pesan</button>
                    </form>
                </div>
            </div>
        </div>


    </section>
    <!-- Contact Section end -->

    <!-- Footer start -->
    <footer class="bgr-first p-3">
        <div class="container">
            <div class="socials d-flex justify-content-center gap-3 pt-4">
                <a class="text-white" href="https://www.instagram.com/lovebuddy.id/"><i
                        data-feather="instagram"></i></a>
                <a class="text-white" href="#"><i data-feather="twitter"></i></a>
                <a class="text-white" href="#"><i data-feather="facebook"></i></a>
            </div>
            <div class="quick-links d-flex flex-wrap justify-content-center gap-3 py-4">
                <a class="text-white text-decoration-none" href="#home">Home</a>
                <a class="text-white text-decoration-none" href="#about">Tentang Kami</a>
                <a class="text-white text-decoration-none" href="#service">Layanan</a>
                <a class="text-white text-decoration-none" href="#product">Konsultasi</a>
                <a class="text-white text-decoration-none" href="#contact">Kontak</a>
            </div>
            <div class="credit">
                <p class="text-center fs-7">Crafted by <a class="text-white text-decoration-none fw-bold" href="">Love
                        Buddy with ❤️</a> | &copy;
                    2023.
                </p>
            </div>
        </div>


    </footer>
    <!-- Footer end -->


    <!-- Register Section End -->
    <!-- Feather Icons -->

    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
    <?php $this->load->view('layout/script'); ?>
    <script>
        // Menambahkan event listener pada tombol "Cek Akun"
        document.getElementById("check-account-btn").addEventListener("click", function () {
            // Menampilkan modal dialog SweetAlert2
            Swal.fire({
                title: 'Apakah Anda sudah memiliki akun?',
                showCancelButton: true,
                confirmButtonText: 'Sudah',
                cancelButtonText: 'Belum',
                customClass: {
                    confirmButton: 'btn',
                    cancelButton: 'btn'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman login
                    window.location.href = "<?php echo base_url('auth/login'); ?>";
                } else if (result.isDismissed) {
                    // Redirect ke halaman registrasi
                    window.location.href = "<?php echo base_url('auth/register'); ?>";
                }
            });
        });

    </script>
</body>

</html>