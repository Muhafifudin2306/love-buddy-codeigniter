<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/style'); ?>
    <title>Admin LoveBuddy.id | Feedback </title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<style>
    .inputGroup {
        background-color: #fff;
        display: block;
        margin: 10px 0;
        position: relative;
    }

    .inputGroup label {
        padding: 12px 30px;
        width: 100%;
        display: block;
        text-align: left;
        color: #3C454C;
        cursor: pointer;
        position: relative;
        z-index: 2;
        transition: color 200ms ease-in;
        overflow: hidden;
    }

    .inputGroup label:before {
        width: 10px;
        height: 10px;
        content: '';
        background-color: #5562eb;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%) scale3d(1, 1, 1);
        transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
        z-index: -1;
    }

    .inputGroup label:after {
        width: 32px;
        height: 32px;
        content: '';
        border: 2px solid #D1D7DC;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
        background-repeat: no-repeat;
        background-position: 2px 3px;
        border-radius: 50%;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        transition: all 200ms ease-in;
    }

    .inputGroup input:checked~label {
        color: #fff;
    }

    .inputGroup input:checked~label:before {
        transform: translate(-50%, -50%) scale3d(56, 56, 1);
        opacity: 1;
    }

    .inputGroup input:checked~label:after {
        background-color: #54E0C7;
        border-color: #54E0C7;
    }

    .inputGroup input {
        width: 32px;
        height: 32px;
        order: 1;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        visibility: hidden;
    }

    .form {
        padding: 0 16px;
        max-width: 550px;
        margin: 50px auto;
        font-size: 18px;
        font-weight: 600;
        line-height: 36px;
    }
</style>

<body class="bg-light">
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
    <div class="py-5 mt-5">
        <div class="container">
            <div class="d-flex justify-content-between pt-5 pb-3">
                <h5 class="fw-bold">Pesan Layanan Konsultasi</h5>
                <a href="<?= site_url('front') ?>">
                    <i class="bi bi-x text-first fs-1"></i></a>

            </div>

            <!-- MultiStep Form -->
            <!-- MultiStep Form -->
            <div class="row flex-md-row-reverse">
                <div class="col-md-5">
                    <div class="list-talent bg-white border rounded p-5">
                        <h5 class="py-3 fw-bold">Detail Psikolog</h5>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 text-center">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <div class="p-5">
                                    <form id="msform">
                                        <!-- progressbar -->
                                        <ul id="progressbar">
                                            <li class="active" id="personal"><strong>Data Personal</strong></li>
                                            <li id="account"><strong>Atur Jadwal</strong></li>
                                            <li id="payment"><strong>Pembayaran</strong></li>
                                            <li id="confirm"><strong>Selesai</strong></li>
                                        </ul>
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title py-5">Lengkapi Data Diri</h2>
                                                <div class="mb-3">
                                                    <input type="text" name="text" placeholder="Nama Lengkap" />
                                                </div>
                                                <div class="mb-2">
                                                    <input type="date" name="uname"
                                                        placeholder="Masukkan Tanggal Lahir" />
                                                </div>
                                                <div class="mb-4">
                                                    <select class="list-dt w-100" name="expmonth">
                                                        <option selected>Jenis Kelamin Anda</option>
                                                        <option>Laki-Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" name="cpwd" placeholder="Nomor Telepon/WA" />
                                                </div>
                                                <div class="mb-4">
                                                    <select class="list-dt w-100" name="expmonth">
                                                        <option selected>Pendidikan Terakhir Anda</option>
                                                        <option>Belum Sekolah</option>
                                                        <option>SD/MI</option>
                                                        <option>SMP/MTS</option>
                                                        <option>SMA/SMK</option>
                                                        <option>S1</option>
                                                        <option>S2</option>
                                                        <option>S3</option>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" name="pwd" placeholder="Pekerjaan" />
                                                </div>
                                                <div class="mb-3">
                                                    <select class="list-dt w-100" name="expmonth">
                                                        <option selected>Status Anda</option>
                                                        <option>Sudah Menikah</option>
                                                        <option>Belum Menikah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="button" name="next"
                                                class="next action-button bg-first text-white my-3 py-2 px-4"
                                                value="Selanjutnya" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <h6 class="pt-5 pb-3 text-black fw-bold">Pilih Jenis Paket</h6>

                                                <div class="row">
                                                    <?php
                                                    $no = 1;
                                                    foreach ($features as $item): ?>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="bg-white border rounded">
                                                                <input type="radio" id="control_0<?= $no ?>" name="select"
                                                                    value="<?= $item->id ?>" checked>
                                                                <label for="control_0<?= $no++ ?>" class="p-2 w-100">
                                                                    <div
                                                                        class="fw-bold text-center text-white w-100 p-2 rounded bgr-first fs-7 mb-2">
                                                                        <?= $item->session_count ?> Sesi
                                                                    </div>
                                                                    <h4 class="text-black text-center">Rp
                                                                        <?= number_format($item->price, 0, ',', '.'); ?>
                                                                    </h4>
                                                                    <h6 class="text-center text-black fs-8">
                                                                        <?= $item->duration ?>
                                                                    </h6>
                                                                    <h6 class="text-center text-black fs-8">
                                                                        <?= $item->service ?>
                                                                    </h6>
                                                                    <h6 class="text-center text-first fs-8 f">*pilih salah
                                                                        satu
                                                                    </h6>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>

                                                <h6 class="py-2 text-black fw-bold">Pilih Waktu</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <input type="date" name="uname"
                                                                placeholder="Masukkan Tanggal Lahir" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2 mt-1">
                                                            <select class="list-dt w-100" name="expmonth">
                                                                <option selected>Pilih Sesi Waktu</option>
                                                                <option>08.00 - 09.00</option>
                                                                <option>09.00 - 10.00</option>
                                                                <option>10.00 - 11.00</option>
                                                                <option>11.00 - 12.00</option>
                                                                <option>12.00 - 13.00</option>
                                                                <option>13.00 - 14.00</option>
                                                                <option>14.00 - 15.00</option>
                                                                <option>15.00 - 16.00</option>
                                                                <option>16.00 - 17.00</option>
                                                                <option>19.00 - 20.00</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="py-2 text-black fw-bold">Email</h6>
                                                <div class="mb-2">
                                                    <input type="email" name="text" placeholder="example@example.com" />
                                                </div>
                                                <h6 class="py-3 text-black fw-bold">Deskripsi Masalah</h6>
                                                <div class="mb-2">
                                                    <textarea id="editor1" class="form-control" rows="5"></textarea>
                                                </div>
                                                <h6 class="py-3 text-black fw-bold">Harapan Setelah Konseling</h6>
                                                <div class="mb-2">
                                                    <textarea id="editor2" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <input type="button" name="next"
                                                class="next action-button bg-first text-white my-1 py-2 px-4"
                                                value="Selanjutnya" />
                                            <input type="button" name="previous"
                                                class="w-100 previous action-button-previous" value="Kembali" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <h6 class="pt-5 pb-3 text-black fw-bold">Pilih Metode Pembayaran</h6>
                                                <?php
                                                $no = 1;
                                                foreach ($payments as $row): ?>
                                                    <div class="inputGroup border">
                                                        <input id="radio<?= $no ?>" name="radio" type="radio" />
                                                        <label for="radio<?= $no++ ?>">
                                                            <img width="75"
                                                                src="<?= base_url('assets/img/bank/' . $row->image) ?>"
                                                                alt="">
                                                            <span class="fw-bold mx-2">
                                                                <?= $row->name ?>
                                                            </span>
                                                        </label>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <input type="button" name="make_payment"
                                                class="next action-button bg-first text-white my-1 py-2 px-4"
                                                value="Confirm" />
                                            <input type="button" name="previous"
                                                class="w-100 previous action-button-previous" value="Kembali" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card">
                                                <h2 class="fs-title text-center">Success !</h2>
                                                <br><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-3">
                                                        <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                            class="fit-image">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-7 text-center">
                                                        <h5>You Have Successfully Signed Up</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.MultiStep Form -->
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
    <script>
        $(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {
                return false;
            })

        });
    </script>
    <script>
        // Inisialisasi CKEditor
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
    </script>
    <!-- Register Section End -->
    <!-- Feather Icons -->
</body>

</html>