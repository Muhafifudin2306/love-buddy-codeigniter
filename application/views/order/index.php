<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/style'); ?>
    <title> LoveBuddy.id | Pesanan Saya </title>
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
    <div class="py-5 mt-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h5 class="fw-bold">Pesanan Saya</h5>
                <a href="<?= base_url('user/consultation') ?>">
                    <button class="btn btn-success">+ Buat Pesanan</button>
                </a>
            </div>
            <div class="bg-white p-5 border">
                <table id="example-1" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Psikolog</th>
                            <th class="text-center" scope="col">Jadwal</th>
                            <th class="text-center" scope="col">Media</th>
                            <th class="text-center" scope="col">Pembayaran</th>
                            <th class="text-center" scope="col">Pembayaran</th>
                            <th class="text-center" scope="col">Pesanan</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($orders as $row) {
                        ?>
                            <tr class="text-center">
                                <td class="text-center text-decoration-none">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row->talent_name; ?>
                                </td>
                                <td>
                                    <p class="text-center"><?php echo date('d/m/Y', strtotime($row->date_order)); ?></p>
                                    <p class="text-center fw-bold text-first" style="font-size: 12px;"><i class="bi bi-alarm mx-2"></i><?php echo $row->time_order; ?></p>

                                </td>
                                <td>
                                    <p style="font-size: 14px;"><?php echo $row->feature_service; ?></p>
                                </td>
                                <td>
                                    <p class="text-center"><?php echo $row->payment_name; ?></p>
                                    <p class="text-center fw-bold text-warning" style="font-size: 12px;"><i class="bi bi-cash mx-2"></i></i><?php echo $row->payment_number; ?></p>
                                </td>
                                <td class="text-center">
                                    <?php if ($row->payment_status == 'Pending') : ?>
                                        <button style="font-size: 12px;" class="btn btn-warning"><?php echo $row->payment_status; ?></button>
                                    <?php elseif ($row->payment_status == 'Revisi') : ?>
                                        <button style="font-size: 12px;" class="btn btn-danger"><?php echo $row->payment_status; ?></button>
                                    <?php elseif ($row->payment_status == 'Terkirim') : ?>
                                        <button style="font-size: 12px;" class="btn btn-info">Dalam Proses</button>
                                    <?php elseif ($row->payment_status == 'Gagal') : ?>
                                        <button style="font-size: 12px;" class="btn btn-danger"><?php echo $row->payment_status; ?></button>
                                    <?php elseif ($row->payment_status == 'Sukses') : ?>
                                        <button style="font-size: 12px;" class="btn btn-success"><?php echo $row->payment_status; ?></button>
                                    <?php endif ?>

                                </td>
                                <td class="text-center">
                                    <?php if ($row->order_status == 'Pending') : ?>
                                        <button style="font-size: 12px;" class="btn btn-warning"><?php echo $row->order_status; ?></button>
                                    <?php elseif ($row->order_status == 'Gagal') : ?>
                                        <button style="font-size: 12px;" class="btn btn-danger"><?php echo $row->order_status; ?></button>
                                    <?php elseif ($row->order_status == 'Sukses') : ?>
                                        <button style="font-size: 12px;" class="btn btn-success"><?php echo $row->order_status; ?></button>
                                    <?php endif ?>

                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('order/detail_payment/' . $row->id . '/' . $row->id_talent, "<button class='btn btn-primary bg-two text-first border-0'>Detail</button>"); ?>
                                        <?php if ($row->payment_status == 'Revisi' || $row->payment_status == 'Gagal') : ?>
                                            <?php echo anchor('order/edit_payment/' . $row->id, "<button class='btn btn-primary bg-first border-0'>Ulangi</button>"); ?>
                                        <?php endif ?>
                                        <?php if ($row->payment_status == 'Pending') : ?>
                                            <?php echo anchor('order/edit_payment/' . $row->id, "<button class='btn btn-primary bg-first border-0'>Bayar</button>"); ?>
                                        <?php endif ?>
                                    </div>
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
            $('#example-1').DataTable();
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
</body>

</html>