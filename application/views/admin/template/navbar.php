<nav class="navbar navbar-header navbar-expand navbar-light bg-white shadow-xs border-bottom sticky-top">
    <a class="sidebar-toggler" href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
            <li class="dropdown">
                <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link dropdown-toggle" aria-expanded="false">
                    <div class="d-none d-md-block d-lg-inline-block me-3">Hi, <?= $this->session->nama ?></div>
                    <div class="avatar avatar-lg me-1">
                        <?php if ($this->session->foto == null) : ?>
                            <img id="avatar" class="rounded-circle d-flex" src="<?= base_url("assets/uploads/users/default.png") ?>">
                        <?php else : ?>
                            <img id="avatar" class="rounded-circle d-flex" src="<?= base_url("assets/uploads/users/{$this->session->foto}") ?>">
                        <?php endif; ?>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="<?= base_url() ?>"><i data-feather="home"></i> Laman Utama</a>
                    <a class="dropdown-item" href="<?= base_url('home/profil') ?>"><i data-feather="user"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('logout') ?>"><i data-feather="log-out"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="main-content container-fluid">