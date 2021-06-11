<!-- component -->
<!-- This is an example component -->
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



<div class="h-full mt-10">
 
  <div class="border-b-2 block md:flex">

    <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
      <div class="flex justify-between">
        <span class="text-xl font-semibold block">Informasi Akun</span>
        <a href="<?= base_url('editprofile'); ?>" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Edit</a>
      </div>

      <div class="w-full p-8 mx-2 flex justify-center">
        <img id="showImage" class="h-40 w-40 items-center rounded-full" src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200" alt="">                          
        </div>
    </div>
    
    <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
      <div class="rounded  shadow p-6">
        <div class="pb-6">
          <label for="nama_depan" class="font-semibold text-gray-700 block pb-1">Nama Depan</label>
          <div class="flex">
            <input disabled id="nama_depan" name="nama_depan" class="border-1  rounded-r px-4 py-2 w-full" type="text" value="<?= $nama_depan; ?> " />
          </div>
        </div>
        <div class="pb-4">
          <label for="nama_belakang" class="font-semibold text-gray-700 block pb-1">Nama Belakang</label>
          <input disabled id="nama_belakang" name="nama_belakang" class="border-1  rounded-r px-4 py-2 w-full" type="email" value="<?= $nama_belakang; ?>" />
        </div>
        <div class="pb-6">
          <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
          <div class="flex">
            <input disabled id="email" name="email" class="border-1  rounded-r px-4 py-2 w-full" type="text" value="<?= $email; ?> " />
          </div>
        </div>
        <div class="pb-6">
          <label for="tanggal_buat" class="font-semibold text-gray-700 block pb-1">Bergabung sejak</label>
          <div class="flex">
            <input disabled id="tanggal_buat" name="tanggal_buat" class="border-1  rounded-r px-4 py-2 w-full" type="text" value="<?= $tanggal_buat; ?> " />
          </div>
        </div>
      </div>
    </div>

  </div>
 
</div>