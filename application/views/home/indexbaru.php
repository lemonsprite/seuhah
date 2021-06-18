<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Kedai Seuhah</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/croppie.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper relative">
        <nav class="navbar navbar-header navbar-expand navbar-light shadow-sm bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex" href="#">
                    <div class="me-3"><i class="fas fa-store fs-4"></i></div>
                    <h4>Kedai Seuhah</h4>
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center ms-auto">
                        <li class="dropdown">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="false">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?= $user['nama_depan'] ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <style>
            .banner {
                z-index: -1;
                background-image: linear-gradient(to right, rgba(0, 0, 0, .5), rgba(0, 0, 0, .8)), url(<?= base_url('assets/img/all_in.jpg') ?>);
                background-size: cover;
            }
        </style>
        <div class="main-content container-fluid">
            <section class="row py-5 text-center banner">
                <div class=" py-5">
                    <div class="col-lg-6 col-md-8 mx-auto py-5">
                        <div class="py-5">
                            <h1 class="text-white fs-1 fw-bold"><strong>Pesan makanan kesukaan anda!</strong></h1>
                            <p class="lead text-white fs-4">Kami Siap melayani anda dengan cinta <i class="fas fa-heart text-red"></i></p>
                            <a href="#produk" class="btn btn-primary my-2">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">

                <section class="py-5 text-center mx-auto" style="background: #EFF1F2;">
                    <div class="container">
                        <div class="py-5 row">
                            <div class="col-lg-4">
                                <h1 class="fw-light"><i class="fas fa-shipping-fast fs-1 mb-5"></i></h1>
                                <p class="fs-3"><strong>CEPAT</strong></p>
                                <p class="px-3">
                                    Pesanan akan dikirimkan ke rumah anda secepat mungkin agar pelanggan dapat menikmati hidangan dengan segera.
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <h1 class="fw-light"><i class="fas fa-heart fs-1 mb-5"></i></h1>
                                <p class="fs-3"><strong>HIGIENIS</strong></p>
                                <p class="px-3">
                                    Makanan yang kami sediakan adlaah makanan sehat dan tidak mengandung zat yang membahayakan pelanggan.
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <h1 class="fw-light"><i class="fas fa-life-ring fs-1 mb-5"></i></h1>
                                <p class="fs-3"><strong>LAYANAN PELANGGAN</strong></p>
                                <p class="px-3">
                                    Kita berdedikasi untuk melayani selama 24/7 untuk menjawab pertanyaan dan mengatasi setiap keluhan anda.
                                </p>
                            </div>
                        </div>
                    </div>

                </section>

                <section id="produk" class="py-5 text-center">
                    <div class="container">
                        <div class="py-5 row">
                            <h2 class="mb-5 text-uppercase fw-bold">Menu yang kami sediakan</h2>
                            <?php foreach ($produk as $p) : ?>
                                <div class="col-lg-3">
                                    <a href="#">
                                        <div class="w-100">
                                            <img class="rounded" width="100%" src="<?= base_url("assets/uploads/{$p->foto}"); ?>">
                                        </div>
                                    </a>
                                    <div class="d-flex pt-2 align-items-center justify-content-between mb-4">
                                        <div class="d-flex flex-column align-items-start pt-2">
                                            <h5 class="m-0 fw-bold"><?= $p->nama_produk ?></h5>
                                            <h5 class="m-0">
                                                <?= 'Rp ' . number_format($p->harga, 0, ',', '.') ?>
                                            </h5>
                                        </div>
                                        <div class="text-right">
                                            <a href="#" class="btn btn-success btn-sm"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </section>
                <section class="bg-dark py-5 row text-white">
                    <div class="col-md-12">
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3 kelompok d-flex align-items-center">
                                        <i class="fas fa-store me-3 fs-4"></i>
                                        <h3 class="m-0 fs-3 text-white fw-bold">Kedai Seuhah</h3>
                                    </div>
                                    <style>
                                        .daftaranggota li {
                                            margin-left: 1rem;
                                        }

                                        .daftaranggota li a {
                                            color: white;
                                            font-size: 1rem;
                                        }

                                        .daftaranggota li::after {
                                            content: '|';
                                            margin-left: 1rem;
                                        }

                                        .daftaranggota li:last-child::after {
                                            content: '' !important;
                                            margin-left: 1rem;
                                        }

                                        .daftaranggota li:first-child {
                                            margin-left: 0;
                                        }
                                    </style>
                                    <ul class="daftaranggota mb-3" style="list-style: none; margin: 0; padding: 0; display: flex;">
                                        <li><a href="/">Acep Ghifar</a></li>
                                        <li><a href="/">Fadhila Akbar</a></li>
                                        <li><a href="/">Fajar Muharam</a></li>
                                        <li><a href="/">R. Noor Alfath</a></li>
                                        <li><a href="/">Ryaz Azhari</a></li>
                                    </ul>
                                    <div class="text-sm mt-4">
                                        Copyright &copy;
                                        <script>
                                            let x = new Date();
                                            document.write(x.getFullYear());
                                        </script> Kelompok 8 (12.4B.17)
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h3 class="m-0 text-white">Web Programming III</h3>
                                    <span>12.4B.17 - UBSI Tasikmalaya</span>
                                    <div class="sosial pt-3">
                                        <a href="https://www.instagram.com/ubsi_tasikmalaya/" class="text-white me-3">
                                            <i class="fab fa-instagram fs-3"></i>
                                        </a>
                                        <a href="https://www.youtube.com/c/UBSIKampusKotaTasikmalaya" class="text-white me-3">
                                            <i class="fab fa-youtube fs-3"></i>
                                        </a>
                                        <a href="https://twitter.com/UBSI_Tasik" class="text-white me-3">
                                            <i class="fab fa-twitter fs-3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </section>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/js/croppie.js') ?>"></script>
        <script src="<?= base_url('assets/js/feather.min.js') ?>"></script>
        <!-- <script src="<?= base_url('assets/js/perfect-scrollbar.min.js') ?>"></script> -->
        <script src="<?= base_url('assets/js/app.js') ?>"></script>

        <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script>
        <!-- <script src="<?= base_url('assets/js/Chart.min.js') ?>"></script> -->
        <!-- <script src="<?= base_url('assets/js/dashboard.js') ?>"></script> -->
        <!-- <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script> -->
        <script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>
<script>
    $(document).ready(() => {
        $('.datatables').DataTable();;
    });
</script>

</html>