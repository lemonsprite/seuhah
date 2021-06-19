<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Kedai Seuhah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <i class="fas fa-store text-dark fs-1 mb-5"></i>
                                <h3>Register</h3>
                                <p>Silahkan isi form untuk mendaftar.</p>
                            </div>
                            <form action="<?= base_url('register')?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label >Nama Depan</label>
                                            <input class="form-control" name="namaDepan" value="<?= set_value('namaDepan')?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label >Nama Belakang</label>
                                            <input class="form-control" name="namaBelakang" value="<?= set_value('namaBelakang')?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?= set_value('email')?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Password</label>
                                            <input type="password" class="form-control" name="pass1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Verifikasi Password</label>
                                            <input type="password" class="form-control" name="pass2">
                                        </div>
                                    </div>
                                </diV>
                                <hr>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Daftar!</button>
                                </div>
                                <center><a href="<?= base_url('login'); ?>" class="me-2">Sudah punya akun? Login</a> | <a href="<?= base_url('home'); ?>" class="ms-2">Kembali ke dashboard</a></center>
                                
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
                    <strong class="me-auto">Kedai Seuhah</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
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
    $(document).ready(function() {
        $('.toast').toast('show', {
            delay: 200
        });
    })
</script>

</html>