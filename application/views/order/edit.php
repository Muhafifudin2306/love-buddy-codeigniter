<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/style'); ?>
    <title> LoveBuddy.id | Edit Pembayaran </title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

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
        <div class="container col-md-8">
            <div class="d-flex justify-content-between pt-5 pb-3">
                <h5 class="fw-bold">Bayar Sekarang</h5>
                <a href="<?= base_url('order/my_order') ?>">
                    <i class="bi bi-x text-first fs-1"></i></a>

            </div>

            <div class="bg-white p-5 border">
                <form method="post" action="<?php echo base_url('order/payment_save/' . $order->id); ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Psikolog
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" value="<?= $order->talent_name ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pemesan
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" value="<?= $order->user_name ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Metode Pembayaran
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" value="<?= $order->payment_name ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor Rekening Tujuan
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" value="<?= $order->payment_number ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pemilik Nomor Rekening
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" value="<?= $order->payment_admin ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload Bukti Pembayaran
                            <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control" name="bukti_tf" required>
                    </div>

                    <button type="submit" class="btn btn-primary bg-first border-0">Kirim Pembayaran</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Menu -->

    <!-- Footer start -->
    <footer class="bgr-first p-3">
        <div class="container">
            <div class="socials d-flex justify-content-center gap-3 pt-4">
                <a class="text-white" href="https://www.instagram.com/lovebuddy.id/"><i data-feather="instagram"></i></a>
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
        // Inisialisasi CKEditor
        CKEDITOR.replace('editor1');
    </script>

    <!-- Register Section End -->
    <!-- Feather Icons -->
</body>

</html>