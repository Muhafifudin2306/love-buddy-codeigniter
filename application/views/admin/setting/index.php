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
            <div class="d-flex justify-content-between align-items-center py-5">
                <h5 class="fw-bold">Consultation</h5>
                <a href="<?= base_url('admin/consultation_add') ?>">
                    <button class="btn btn-success">+ Tambah</button>
                </a>
            </div>

            <?php
            $error = $this->upload->display_errors();
            echo $error;
            ?>
            <div class="bg-white p-5 border">
                <table id="example1" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Cover</th>
                            <th class="text-center" scope="col">Nama</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($talents as $row) {
                            ?>
                            <tr class="text-center">
                                <td class="text-center text-decoration-none">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <img width="250" src="<?= base_url('assets/img/' . $row->cover) ?>" alt="">
                                </td>
                                <td>
                                    <?php echo $row->name; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('admin/edit_talent/' . $row->id, "<button class='btn btn-warning border-0'>Edit</button>"); ?>
                                        <button onclick="return confirm('Do you want delete this record')"
                                            class="btn btn-danger">
                                            <?php echo anchor('admin/delete_talent/' . $row->id, "<span class='text-white border-0 text-decoration-none'>Hapus</span>"); ?>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center py-5">
                <h5 class="fw-bold">Service</h5>
                <a href="<?= base_url('admin/service_add') ?>">
                    <button class="btn btn-success">+ Tambah</button>
                </a>
            </div>
            <div class="bg-white p-5 border">
                <table id="example4" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Layanan</th>
                            <th class="text-center" scope="col">Media</th>
                            <th class="text-center" scope="col">Icon</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($services as $row) {
                            ?>
                            <tr class="text-center">
                                <td class="text-center text-decoration-none">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row->name; ?>
                                </td>
                                <td>
                                    <?php echo $row->media; ?>
                                </td>
                                <td>
                                    <?php echo $row->icon; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('admin/edit_service/' . $row->id, "<button class='btn btn-warning border-0'>Edit</button>"); ?>
                                        <button onclick="return confirm('Do you want delete this record')"
                                            class="btn btn-danger">
                                            <?php echo anchor('admin/delete_service/' . $row->id, "<span class='text-white border-0 text-decoration-none'>Hapus</span>"); ?>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>


            <div class="d-flex justify-content-between align-items-center py-5">
                <h5 class="fw-bold">Category</h5>
                <a href="<?= base_url('admin/category_add') ?>">
                    <button class="btn btn-success">+ Tambah</button>
                </a>
            </div>
            <div class="bg-white p-5 border">
                <table id="example2" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Kategori</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($categories as $row) {
                            ?>
                            <tr class="text-center">
                                <td class="text-center text-decoration-none">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row->name; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('admin/edit_category/' . $row->id, "<button class='btn btn-warning border-0'>Edit</button>"); ?>
                                        <button onclick="return confirm('Do you want delete this record')"
                                            class="btn btn-danger">
                                            <?php echo anchor('admin/delete_category/' . $row->id, "<span class='text-white border-0 text-decoration-none'>Hapus</span>"); ?>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center py-5">
                <h5 class="fw-bold">Service</h5>
                <a href="<?= base_url('admin/service_add') ?>">
                    <button class="btn btn-success">+ Tambah</button>
                </a>
            </div>
            <div class="bg-white p-5 border">
                <table id="example3" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Layanan</th>
                            <th class="text-center" scope="col">Media</th>
                            <th class="text-center" scope="col">Icon</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($services as $row) {
                            ?>
                            <tr class="text-center">
                                <td class="text-center text-decoration-none">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row->name; ?>
                                </td>
                                <td>
                                    <?php echo $row->media; ?>
                                </td>
                                <td>
                                    <?php echo $row->icon; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('admin/edit_service/' . $row->id, "<button class='btn btn-warning border-0'>Edit</button>"); ?>
                                        <button onclick="return confirm('Do you want delete this record')"
                                            class="btn btn-danger">
                                            <?php echo anchor('admin/delete_service/' . $row->id, "<span class='text-white border-0 text-decoration-none'>Hapus</span>"); ?>
                                        </button>
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
        $(document).ready(function () {
            $('#example1').DataTable();
        });
        $(document).ready(function () {
            $('#example2').DataTable();
        });
        $(document).ready(function () {
            $('#example3').DataTable();
        });
        $(document).ready(function () {
            $('#example4').DataTable();
        });
    </script>


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