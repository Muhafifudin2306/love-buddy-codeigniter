<nav class="navbar navbar-expand-lg fixed-top bg-white bg-opacity-75 border-bottom-first">
    <div class="container">
        <a href="https://www.instagram.com/lovebuddy.id/" class="navbar-brand d-none d-md-inline"> <img
                src="https://lovebuddy.id/assets/img/logopanjang.png" alt="logo" width="120"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center gap-2" id="navbarSupportedContent">
            <ul class="navbar-nav gap-3">
                <?php if ($id_role != 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-black fs-7" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fs-7" href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fs-7" href="#service">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fs-7" href="#product">Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fs-7" href="#contact">Kontak</a>
                    </li>
                <?php } else if ($id_role == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-black fs-7" aria-current="page"
                                href="<?php echo base_url('front') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black fs-7" aria-current="page"
                                href="<?php echo base_url('admin/account') ?>">Akses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black fs-7" aria-current="page"
                                href="<?php echo base_url('admin/feedback') ?>">Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black fs-7" aria-current="page"
                                href="<?php echo base_url('admin/setting') ?>">Pengaturan</a>
                        </li>
                <?php } ?>
            </ul>
        </div>
        <div class="d-flex gap-2">
            <?php if ($is_login) { ?>
                <a href="<?= base_url('auth/logout') ?>">
                    <button data-bs-toggle="modal" data-bs-target="#ModalLogin"
                        class="btn btn-danger px-4 py-2 fw-bold fs-7 rounded-5 bg-first border-0">
                        Logout</button>
                </a>
            <?php } else { ?>
                <a href="<?= base_url('auth/login') ?>">
                    <button data-bs-toggle="modal" data-bs-target="#ModalLogin"
                        class="btn btn-danger px-4 py-2 fw-bold fs-7 rounded-5 bg-first border-0">
                        Login</button>
                </a>
                <a href="<?= base_url('auth/register') ?>">
                    <button data-bs-toggle="modal" data-bs-target="#ModalRegister"
                        class="btn btn-danger px-4 py-2 fw-bold fs-7 rounded-5 bg-first border-0">
                        Register</button>
                </a>
            <?php } ?>
        </div>
    </div>
</nav>