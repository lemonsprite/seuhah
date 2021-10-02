<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Kedai Seuhah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>
    <div id="auth" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <i class="fas fa-store text-dark fs-1 mb-5"></i>
                                <h3>Masuk</h3>
                                <p>Silahkan masuk untuk Melanjutkan.</p>
                            </div>
                            <form action="<?= base_url('login') ?>" method="post">
                                <div class="form-group position-relative has-icon-left">
                                    <label>Email</label>
                                    <div class="position-relative">
                                        <input name="email" type="text" class="form-control" value="<?= set_value('email')?>">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label>Password</label>

                                    </div>
                                    <div class="position-relative">
                                        <input name="password" type="password" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="clearfix">
                                    <button class="btn btn-primary btn-block">Login</button>
                                    <div class=" mt-4">
                                        
                                        <center><a href="<?= base_url('auth/register') ?>" class="me-2">Gak Punya Akun?</a> | <a href="<?= base_url('home'); ?>" class="ms-2">Kembali ke dashboard</a></center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 5">
        <?= validation_errors() ?>
        <?php if ($this->session->tempdata('pesan') != NULL) : ?>
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-info text-white">
                    <strong class="me-auto">Notifikasi</strong>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?= $this->session->tempdata('pesan') ?>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- <script src="<?= base_url('assets/js/croppie.js') ?>"></script> -->
    <script src="<?= base_url('assets/js/feather.min.js') ?>"></script>
    <!-- <script src="<?= base_url('assets/js/perfect-scrollbar.min.js') ?>"></script> -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>

    <!-- <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script> -->
    <!-- <script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script> -->
    <!-- <script src="<?= base_url('assets/js/Chart.min.js') ?>"></script> -->
    <!-- <script src="<?= base_url('assets/js/dashboard.js') ?>"></script> -->
    <!-- <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script> -->
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
<script>
    /** Toass Notif Init */
    $(document).ready(function() {
        $('.toast').toast('show', {
            delay: 200
        });
    })
</script>

</html>