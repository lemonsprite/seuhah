<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            Kedai Seuhah
            <a href="<?= base_url('home') ?>" class="btn btn-outline-primary">Lihat Toko</a>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>

                <li class="sidebar-item <?php if($this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '') { echo 'active'; } ?> ">
                    <a href="<?= base_url('admin/dashboard') ?>" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>



                <li class="sidebar-item <?php if($this->uri->segment(2) == 'users') { echo 'active'; } ?>">
                    <a href="<?= base_url('admin/users') ?>" class='sidebar-link'>
                        <i data-feather="users" width="20"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item <?php if($this->uri->segment(2) == 'produk') { echo 'active'; } ?>">
                    <a href="<?= base_url('admin/produk') ?>" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="sidebar-item <?php if($this->uri->segment(2) == 'pesanan') { echo 'active'; } ?>">
                    <a href="<?= base_url('admin/pesanan') ?>" class='sidebar-link'>
                        <i data-feather="truck" width="20"></i>
                        <span>Pesanan</span>
                    </a>
                </li>



                <!-- <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Components</span>
                            </a>

                            <ul class="submenu ">
                                <li>
                                    <a href="component-alert.html">Alert</a>
                                </li>

                                <li>
                                    <a href="component-badge.html">Badge</a>
                                </li>

                                <li>
                                    <a href="component-breadcrumb.html">Breadcrumb</a>
                                </li>

                                <li>
                                    <a href="component-buttons.html">Buttons</a>
                                </li>

                                <li>
                                    <a href="component-card.html">Card</a>
                                </li>

                                <li>
                                    <a href="component-carousel.html">Carousel</a>
                                </li>

                                <li>
                                    <a href="component-dropdowns.html">Dropdowns</a>
                                </li>

                                <li>
                                    <a href="component-list-group.html">List Group</a>
                                </li>

                                <li>
                                    <a href="component-modal.html">Modal</a>
                                </li>

                                <li>
                                    <a href="component-navs.html">Navs</a>
                                </li>

                                <li>
                                    <a href="component-pagination.html">Pagination</a>
                                </li>

                                <li>
                                    <a href="component-progress.html">Progress</a>
                                </li>

                                <li>
                                    <a href="component-spinners.html">Spinners</a>
                                </li>

                                <li>
                                    <a href="component-tooltips.html">Tooltips</a>
                                </li>

                            </ul>

                        </li> -->



            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<div id="main">