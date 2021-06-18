<nav class="navbar navbar-header navbar-expand navbar-light shadow-sm bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex" href="<?= base_url() ?>">
            <div class="me-3"><i class="fas fa-store fs-4"></i></div>
            <h4>Kedai Seuhah</h4>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center ms-auto">
                <li class="dropdown">
                    <?php
                    if (isset($_SESSION['status']))
                    {
                        echo '<a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="false">';
                        echo '<div class="d-none d-md-block d-lg-inline-block">Hi, '. $user["nama_depan"].'</div>';
                        echo '<div class="avatar ms-3">';
                        echo '<img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">';
                        echo '</div>';
                        echo '</a>';
                    }
                    else
                    {
                        echo '<a href="' . base_url("login") . '" class="btn btn-dark btn-sm text-white">Masuk</a>';
                    }

                    ?>
                                                
                        
                    
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