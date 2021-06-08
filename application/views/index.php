
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
    <div class="wrapper">
        <div class='h-screen relative pt-16' style="z-index: -1; background-image: linear-gradient(to right, rgba(0,0,0,.4), rgba(0,0,0,.6) ), url(<?= base_url('assets/img/all_in.jpg')?>); background-size: cover;">
            <div class="md:container m-auto p-4 flex justify-center items-center h-full flex-col px-10">
                <h1 class="text-5xl font-bold text-white mb-2">Pesan makanan kesukaan anda.</h1>
                <h2 class="text-4xl font-light text-white">Kami siap melayani anda dengan <span class="text-blue-500 font-bold">cinta <i class="fas fa-heart"></i></span></h2>
            </div>
        </div>

        <div id="konten" class="konten">
            <div class="section ">
                <div class="md:container m-auto  px-10 py-20">
                    <h1 class="font-bold text-4xl pb-16">Menu yang kami Sediakan.</h1>
                    <div class="grid grid-cols-4 gap-5">
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/ayamgoreng.jpg'); ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Ayam Goreng</h2>
                            </a>
                        </div>
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/baso.jpeg') ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Mie Baso</h2>
                            </a>
                        </div>
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/migoreng.jpeg') ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Mie Goreng</h2>
                            </a>
                        </div>
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/nasi_padang.jpeg') ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Nasi Padang</h2>
                            </a>
                        </div>
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/kopi.jpg') ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Kopi</h2>
                            </a>
                        </div>
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/seblak.jpg') ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Seblak</h2>
                            </a>
                        </div>
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/nasigoyeng.jpeg') ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Nasi Goreng</h2>
                            </a>
                        </div>
                        <div class="kartu pb-5">
                            <a href="#" class="flex-col">
                                <div class="foto h-4/5 truncate rounded-md">
                                    <img src="<?= base_url('assets/img/soteng.jpg') ?>" class="shadow-md object-cover w-full h-full">
                                </div>
                                <h2 class="font-bold pt-4 text-lg">Soteng</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section py-20 bg-green-500  ">
                <div class="md:container m-auto px-8 text-center">
                    <div class="grid grid-cols-3 gap-5">
                        <span class="col text-white p-5 block rounded-full">
                            <i class="fas fa-shipping-fast text-4xl mb-5"></i>
                            <h1 class="mb-5 text-xl font-bold">CEPAT</h1>
                            <desc>
                                Pesanan akan dikirimkan ke rumah anda secepat mungkin agar pelanggan dapat menikmati hidangan dengan segera.
                            </desc>
                        </span>
                        <span class="col text-white p-5 block rounded-full">
                            <i class="fas fa-heart text-4xl mb-5"></i>
                            <h1 class="mb-5 text-xl font-bold">SEHAT</h1>
                            <desc>
                                Makanan yang kami sediakan adlaah makanan sehat dan tidak mengandung zat yang membahayakan pelanggan.
                            </desc>
                        </span>
                        <span class="col text-white p-5 block rounded-full">
                            <i class="fas fa-life-ring text-4xl mb-5"></i>
                            <h1 class="mb-5 text-xl font-bold">LAYANAN PELANGGAN</h1>
                            <desc class='mt-5'>
                                Kita berdedikasi untuk melayani selama 24/7 untuk menjawab pertanyaan dan mengatasi setiap keluhan anda.
                            </desc>
                        </span>
                    </div>
                </div>
                
            </div>
        </div>

        
    
