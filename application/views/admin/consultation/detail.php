<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/style'); ?>
    <title>Konsultasi Dengan LoveBuddy.id </title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <!-- Bootstrap Logo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-two">
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


    <!-- Main Menu -->
    <div class="pb-3 bg-white">
        <div class="container">
            <div class="up-content pt-5 pb-1">
                <a href="<?= site_url('front') ?>" class="back">
                    <i class="bi bi-arrow-left fs-5 fw-bold text-first"></i>
                    <span class="fs-5 text-first">Kembali</span>
                </a>
                <h5 class="text-center fw-bold">Detail Psikolog</h5>
            </div>
        </div>
    </div>
    <div class="container col-lg-10">
        <?php foreach ($talents as $talent): ?>
            <div class="list-talent bg-white rounded p-5 my-3">
                <div class="row">
                    <div class="col-md-4">
                        <img class="w-100" src="<?= base_url('assets/img/' . $talent->cover) ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="talent-title mb-3">
                            <a href="<?= site_url('user/consultation_detail/' . $talent->id) ?>">
                                <h5 class="fw-bold text-black">
                                    <?= $talent->name ?>
                                </h5>
                            </a>
                        </div>
                        <div class="talent-category mb-3">
                            <?php
                            $category = explode(',', $talent->category);
                            foreach ($category as $kat) {
                                echo "
                                    <button class='btn btn-danger bg-two border-0 text-first'>" . $kat . "</button>";
                            }
                            ?>
                        </div>
                        <div class="talent-experience mb-2">
                            <i class="bi bi-briefcase-fill text-first"></i>
                            <span class="text-first">
                                <?= $talent->experience ?> Tahun Pengalaman
                            </span>
                        </div>
                        <div class="talent-rating mb-2">
                            <i class="bi bi-star-fill text-first"></i>
                            <span class="text-first">
                                <?= round($talent->rating) ?>%
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>


    <!-- Main Menu -->


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
</body>

</html>