<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <?php $this->load->view('layout/style'); ?>
    <title>Register Akun LoveBuddy.id</title>
</head>

<body class="bg-two">

    <div class="container">

        <section class="login" id="login">
            <div class="wrapper vh-100 w-100">
                <div class="d-flex justify-content-between mb-5 pt-3">
                    <img src="https://lovebuddy.id/img/logopanjang.png" alt="logo" width="200">
                    <a href="<?= base_url('front') ?>">
                        <i class="bi bi-x text-first fs-1"></i>
                    </a>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="<?= base_url('assets/img/landingpage/logo-1.png') ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-white border-first rounded p-5">
                                <h3 class="fw-bold mb-4">Selamat Datang di <span class="text-first">LoveBuddy </span>
                                </h3>
                                <form action="<?= base_url('auth/register_proccess') ?>" method="post">
                                    <div class="login__field" hidden>
                                        <input type="text" class="login__input" name="id_role" id="id_role" value="2">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold fs-7">Nama Lengkap</label>
                                        <input type="name" name="name" placeholder="example@example.com"
                                            class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold fs-7">Email address</label>
                                        <input type="email" name="email" placeholder="example@example.com"
                                            class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold fs-7">Password</label>
                                        <input type="password" name="password" placeholder="******" class="form-control"
                                            required>
                                    </div>
                                    <button type="submit"
                                        class="btn fs-7 fw-bold btn-primary w-100 bg-first border-0">Masuk</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php $this->load->view('layout/script'); ?>
</body>

</html>