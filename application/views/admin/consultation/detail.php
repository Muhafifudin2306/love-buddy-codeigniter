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

    <div class="container col-md-6">

        <div class="list-talent bg-white rounded p-5 my-3">
            <div class="row">
                <div class="col-md-12">
                    <img class="w-100 mb-3" src="<?= base_url('assets/img/' . $talent->cover) ?>" alt="">
                </div>
                <div class="col-md-12">
                    <div class="talent-title mb-3">
                        <a href="<?= site_url('user/consultation_detail/' . $talent->id) ?>">
                            <h5 class="fw-bold text-black text-center">
                                <?= $talent->name ?>
                            </h5>
                        </a>
                    </div>
                    <div class="talent-category mb-3 d-flex gap-2 justify-content-center">
                        <div class="talent-category mb-3">
                            <?php foreach ($talent_categories as $item): ?>
                                <?php
                                $category = explode(',', $item->category);
                                foreach ($category as $kat) {
                                    echo "
                                    <button class='btn btn-danger bg-two border-0 text-first'>" . $kat . "</button>";
                                }
                                ?>
                            <?php endforeach ?>
                        </div>

                    </div>
                    <div class="talent-service mb-2">
                        <hr>
                        <p class="text-center">
                            Melayani Via :
                            <?php foreach ($talent_services as $row): ?>
                                <?php
                                $service_name = explode(',', $row->service_name);
                                $service_icon = explode(',', $row->service_icon);
                                foreach ($service_name as $name) {
                                    foreach ($service_icon as $icon) {

                                        echo "<span class='text-first mx-2'>" . $icon . "</span>";
                                        echo "<span class='text-black'>" . $name . "</span>";
                                    }
                                }
                                ?>
                            <?php endforeach ?>
                        </p>
                        <hr>
                    </div>

                    <div class="line w-25 bgr-first rounded my-3" style="height:15px">
                    </div>

                    <div class="profile my-3">
                        <h6 class="fw-bold"> Profile
                            <?= $talent->name ?>
                        </h6>
                        <p>
                            <?= $talent->summary ?>
                        </p>
                    </div>

                    <div class="talent-quote bg-two py-1 px-3 rounded my-3">
                        <div class="d-flex justify-content-between">
                            <i class="bi bi-quote fs-1 text-white"></i>
                            <span class="pt-3 text-white fw-bold">
                                <?= $talent->quote ?>
                            </span>
                            <i class="bi bi-quote fs-1 text-white"></i>
                        </div>
                    </div>
                    <div class="education my-3">
                        <i class="fs-5 bi bi-bookmark-check-fill text-first"></i>
                        <span class="fw-bold fs-6 mx-1"> Pendidikan</span>
                        <ul>
                            <?php foreach ($talent_educations as $row): ?>
                                <?php
                                $edu_state = explode(',', $row->state);
                                $edu_field = explode(',', $row->field);
                                $edu_univ = explode(',', $row->university);
                                foreach ($edu_state as $state) {
                                    foreach ($edu_field as $field) {
                                        foreach ($edu_univ as $university) {
                                            echo "<li>" . $state . ' ' . $field . ' ' . $university . "</li>";
                                        }
                                    }
                                }
                                ?>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="nip my-3">
                        <i class="fs-5 bi bi-shield-fill-check text-first"></i>
                        <span class="fw-bold fs-6 mx-1"> Nomor Izin Praktek</span>
                        <p>
                            <?= $talent->nip ?>
                        </p>
                    </div>
                    <div class="experience my-3">
                        <i class="fs-5 bi bi-bag-dash-fill text-first"></i>
                        <span class="fw-bold fs-6 mx-1">
                            <?= $talent->experience ?> Tahun Pengalaman
                        </span>
                    </div>
                    <!-- <div class="rating my-3">
                        <i class="fs-5 bi bi-star-fill text-first"></i>
                        <span class="fw-bold fs-6 mx-1">
                            <?= round($talent->rating) ?>%
                        </span>
                    </div> -->
                    <div class="line w-25 bgr-first rounded my-3" style="height:15px">
                    </div>

                    <div class="profile mt-3">
                        <h6 class="fw-bold"> Podcast Sharing
                        </h6>

                        <div class="pt-3" id="player"></div>

                    </div>
                    <div class="btn-order py-3">
                        <a href="<?= site_url('user/form_consultation/' . $talent->id) ?>">
                            <button class="btn btn-danger bg-first border-0 w-100 fw-bold">Konseling Sekarang</button>
                        </a>
                    </div>

                </div>
            </div>

        </div>
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
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        // Global variable untuk menyimpan objek pemutar video
        var player;

        // Fungsi untuk memanggil API YouTube dan membuat pemutar video
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                videoId: '<?= $talent->video ?>', // Ganti VIDEO_ID dengan ID video YouTube yang ingin diputar
                playerVars: {
                    autoplay: 1,
                    disablekb: 1,
                    modestbranding: 1,
                    rel: 0,
                    showinfo: 0,
                    fs: 1
                },
                events: {
                    'onReady': onPlayerReady,

                }
            });
        }

        function onPlayerReady(event) {
            // Mendapatkan elemen iframe
            var iframe = event.target.getIframe();

            // Mengatur ukuran pemutar YouTube sesuai kebutuhan
            iframe.style.width = '100%';
            // iframe.style.height = '25rem';
        }


    </script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
    <?php $this->load->view('layout/script'); ?>
</body>

</html>