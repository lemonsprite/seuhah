<body>
    <div class="navbar h-16 bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 w-full text-white transition-all transition-75 shadow-md">
        <div class="lg:container m-auto flex items-center justify-between h-full px-10">
            <a href="<?= base_url() ?>" class="brand flex items-center">
                <i class="fas fa-store mr-5 text-xl"></i>
                <h1 class="font-bold text-xl shadow-outline">Kedai Seuhah</h1>
            </a>
            <div class="user flex relative">
                <button onclick="cart_open()" class="h-10 w-auto px-4 bg-blue-500 flex items-center justify-center mr-5 rounded-md relative text-white focus:outline-none">
                    <div class="item-sum mr-2 font-bold text-current">3</div>
                    <i class="fas fa-shopping-bag text-current mr-3"></i>
                    <div class="harga text-current">Rp. 2.000</div>
                </button>
                <?php

                if (isset($_SESSION['status'])) {
                    echo '<button onclick="pic_drop()" class="pic focus:outline-none rounded-full truncate w-10 h-10 border border-white"><img src="' . base_url("assets/img/pic.jpg") . '" height="40"></button>';
                } else {
                    echo '<a href="' . base_url("login") . '" class="h-10 w-auto px-4 bg-gray-500 flex items-center justify-center mr-5 rounded-md relative text-white focus:outline-none">Masuk</a>';
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
                        if ($_SESSION['role'] == 1) {
                            echo '<li>
                                <a href="' . base_url('admin/dashboard') . '" class="py-2 px-3 grid items-center hover:bg-gray-200 rounded-md">
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


    <!-- component -->
    <div class="bg-white shadow rounded-lg p-7">
        <?= form_open_multipart('editprofile'); ?>
        <div class="grid lg:grid-cols-1 gap-6">
            <h2 class="font-bold text-2xl">Edit Profil</h2>
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="email" class="bg-white text-gray-600 px-1">Email</label>
                    </p>
                </div>
                <p>
                    <input id="email" name="email" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block" value=" <?php echo $email; ?> " readonly>
                </p>
            </div>
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="nama_depan" class="bg-white text-gray-600 px-1">Nama Depan</label>
                    </p>
                </div>
                <p>
                    <input id="nama_depan" name="nama_depan" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" value=" <?php echo $nama_depan; ?>">
                </p>
            </div>
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="nama_belakang" class="bg-white text-gray-600 px-1">Nama Belakang</label>
                    </p>
                </div>
                <p>
                    <input id="nama_belakang" name="nama_belakang" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" value=" <?php echo $nama_belakang; ?>">
                </p>
            </div>
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="foto" class="bg-white text-gray-600 px-1">Foto</label>
                    </p>
                </div>
                <img id="showImage" class="h-40 w-40 py-1 px-1 rounded-full" src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200" alt="">
            </div>
        </div>
        <div class="border-t mt-6 pt-3">
            <button type="submit" class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
            Simpan
            </button>
            
        </div>
        </form>
    </div>