<nav class="navbar navbar-header navbar-expand navbar-light shadow-sm bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
            <div class="me-3"><i class="fas fa-store fs-4"></i></div>
            <h4 class='mb-0'>Kedai Seuhah</h4>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center ms-auto">
                <li class="position-relative me-4 ">
                    <button class="btn btn-dark text-white position-relative" data-bs-toggle="offcanvas" data-bs-target="#cart" role="button" aria-controls="cart">
                        <i class="fas fa-shopping-bag me-3"></i>
                        <span id="tasbelanja">Keranjang</span>
                    </button>
                    <span id="countTas" class="badge bg-danger rounded-pill bg-primary position-absolute top-0 start-0 translate-middle" style="font-size: .8rem;">0</span>
                </li>
                <li class="dropdown">
                    <?php if (isset($_SESSION['status'])) : ?>

                        <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="false">
                            <!-- <div class="d-none d-md-block d-lg-inline-block">Hi, <?= $user["nama_depan"] ?></div> -->
                            <div class="avatar ms-3">
                                <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                            </div>
                        </a>

                    <?php else : ?>
                        <a href="<?= base_url("login") ?>" class="btn btn-dark text-white">Masuk</a>
                    <?php endif; ?>



                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="<?= base_url('admin/dashboard') ?>"><i data-feather="grid"></i> Dashboard</a>
                        <a class="dropdown-item" href="<?= base_url('profil') ?>"><i data-feather="user"></i> Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>"><i data-feather="log-out"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>