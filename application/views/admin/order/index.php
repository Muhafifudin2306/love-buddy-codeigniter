<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/style'); ?>
    <title>Admin LoveBuddy.id | Feedback </title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>


    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
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

    <!-- Main Menu -->
    <div class="py-5 mt-5">
        <div class="container">
            <h5 class="py-5 fw-bold">Manajemen Pesanan Pengguna</h5>
            <div class="bg-white p-5 border">
                <table id="example" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Psikolog</th>
                            <th class="text-center" scope="col">Pemesan</th>
                            <th class="text-center" scope="col">No.Telephone/WA</th>
                            <th class="text-center" scope="col">Payment</th>
                            <th class="text-center" scope="col">Payment</th>
                            <th class="text-center" scope="col">Order</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($orders as $row) {
                        ?>
                            <tr>
                                <td class="text-center text-decoration-none">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row->talent_name; ?>
                                </td>
                                <td>
                                    <?php echo $row->user_name; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $row->number; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $row->payment_name; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($row->payment_status == 'Pending' || $row->payment_status == 'Revisi') : ?>
                                        <button class="btn btn-warning"><?php echo $row->payment_status; ?></button>
                                    <?php elseif ($row->payment_status == 'Terkirim') : ?>
                                        <button class="btn btn-info"><?php echo $row->payment_status; ?></button>
                                    <?php elseif ($row->payment_status == 'Gagal') : ?>
                                        <button class="btn btn-danger"><?php echo $row->payment_status; ?></button>
                                    <?php elseif ($row->payment_status == 'Sukses') : ?>
                                        <button class="btn btn-success"><?php echo $row->payment_status; ?></button>
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($row->order_status == 'Pending') : ?>
                                        <button class="btn btn-warning"><?php echo $row->order_status; ?></button>
                                    <?php elseif ($row->order_status == 'Gagal') : ?>
                                        <button class="btn btn-danger"><?php echo $row->order_status; ?></button>
                                    <?php elseif ($row->order_status == 'Sukses') : ?>
                                        <button class="btn btn-success"><?php echo $row->order_status; ?></button>
                                    <?php endif ?>

                                </td>
                                <td>
                                    <?php if ($row->payment_status == 'Terkirim' || $row->payment_status == 'Revisi' || $row->payment_status == 'Sukses') : ?>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <?php echo anchor('admin/order_edit_status/' . $row->id, "<button class='btn btn-danger bg-first border-0'>Ubah Status</button>"); ?>
                                        </div>
                                    <?php endif ?>

                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Main Menu -->

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>


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


    <!-- Register Section End -->
    <!-- Feather Icons -->

    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
    <?php $this->load->view('layout/script'); ?>
    <script>
        // Menambahkan event listener pada tombol "Cek Akun"
        document.getElementById("check-account-btn").addEventListener("click", function() {
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