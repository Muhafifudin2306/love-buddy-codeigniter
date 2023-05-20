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
    <div class="py-5 mt-5">
        <div class="container">
            <h5 class="py-5 fw-bold">Pengaturan Akun</h5>
            <div class="bg-white p-5 border">
                <table id="example" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Lengkap</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Role</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($users as $row) {
                            ?>
                            <tr>
                                <td class="text-center text-decoration-none">
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row->name; ?>
                                </td>
                                <td>
                                    <?php echo $row->email; ?>
                                </td>
                                <td>
                                    <?php echo $row->roles_name; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('admin/edit_account/' . $row->id, "<button class='btn btn-primary bg-first border-0'>Edit</button>"); ?>
                                        <button onclick="return confirm('Do you want delete this record')"
                                            class="btn btn-danger">
                                            <?php echo anchor('admin/delete_account/' . $row->id, "<span class='text-white border-0 text-decoration-none'>Hapus</span>"); ?>
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
            $('#example').DataTable();
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
</body>

</html>