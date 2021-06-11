<body>
    <div class="navbar h-16 fixed top-0 w-full text-white transition-all transition-75">
        <div class="lg:container m-auto flex items-center justify-between h-full px-10">
            <a href="<?= base_url() ?>" class="brand flex items-center">
                <i class="fas fa-store mr-5 text-white text-xl"></i>
                <h1 class="font-bold text-xl shadow-outline">Kedai Seuhah</h1>
            </a>
            <div class="user flex relative">
                <button onclick="cart_open()" class="h-10 w-auto px-4 bg-blue-500 flex items-center justify-center mr-5 rounded-md relative text-white focus:outline-none">
                    <div class="item-sum mr-2 font-bold text-current">3</div>
                    <i class="fas fa-shopping-bag text-current mr-3"></i>
                    <div class="harga text-current">Rp. 2.000</div>
                </button>
                <?php 
                
                if(isset($_SESSION['status']))
                {
                    echo '<button onclick="pic_drop()" class="pic focus:outline-none rounded-full truncate w-10 h-10 border border-white"><img src="'.base_url("assets/img/pic.jpg").'" height="40"></button>';
                } else {
                    echo '<a href="'. base_url("login") .'" class="h-10 w-auto px-4 bg-gray-500 flex items-center justify-center mr-5 rounded-md relative text-white focus:outline-none">Masuk</a>';
                }
        
                ?>

                
                <div class="dropdown bg-white shadow-lg text-black absolute top-full mt-2 rounded-md right-0 py-3 px-4 hidden">
                    <ul class="text-left">
                        <li>

                            <a href="<?= base_url('myprofile') ?>" class="py-2 px-3 flex items-center hover:bg-gray-200 rounded-md">
                                <i class="fas fa-user"></i>
                                <span class="ml-4">Profil Saya</span>
                            </a>
                        </li>
                        <?php
                        if($_SESSION['role'] == 1)
                        {
                            echo '<li>
                                <a href="'.base_url('admin/dashboard').'" class="py-2 px-3 grid items-center hover:bg-gray-200 rounded-md">
                                    <span >Dashboard</span>
                                </a>
                            </li>';
                        }
                        ?>
                        <li>
                            <a href="<?= base_url('logout') ?>" class="py-2 px-3 grid items-center hover:bg-gray-200 rounded-md">
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>