<body>
    <!-- component -->
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                    <div class="text-center">
                        <h1 class="font-bold text-2xl mb-2">Kedai Seuhah</h1>
                        <p class="text-lg">Buat akun milik anda sendiri.</p>
                    </div>
                    <form method="post" action="<?= base_url('proses/daftar') ?>" class="mt-10">
//contoh
                        <div class="grid grid-cols-2 gap-2">
                            <input name='nama_depan' value="<?= set_value('nama_depan') ?>" type="text" placeholder="Nama Depan" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none px-4">
                            <input name='nama_belakang' value="<?= set_value('nama_belakang') ?>" type="text" placeholder="Nama Belakang" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none px-4">
                        </div>
                        <div class="flex text-center justify-around">
                            <?= form_error('nama_depan', '<center><small class="text-center text-red-500 m-0 p-0">', '</small></center>') ?> | 
                            <?= form_error('nama_belakang', '<center><small class="text-center text-red-500 m-0 p-0">', '</small></center>') ?></div>
                        <div class="mt-5">
                            <input name="email" value="<?= set_value('email') ?>" type="email" placeholder="Email" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 px-4 focus:outline-none">
                            <?= form_error('email', '<center><small class="text-center text-red-500 m-0 p-0">', '</small></center>') ?>
                        </div>

                        <div class="mt-5">
                            <input name="password" type="password" placeholder="Password" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none px-4">
                            <?= form_error('password', '<center><small class="text-center text-red-500 m-0 p-0">', '</small></center>') ?>
                        </div>

                        <div class="mt-5">
                            <input name="password2" type="password" placeholder="Konfirmasi Password" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none px-4">
                            <?= form_error('password2', '<center><small class="text-center text-red-500 m-0 p-0">', '</small></center>') ?>
                        </div>



                        <div class="mt-5">
                            <button class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Register
                            </button>
                        </div>

                        <div class="mt-5">
                            <div class="flex justify-center items-center">
                                <label class="mr-2">Sudah punya akun? </label>
                                <a href="<?= base_url('login') ?>" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Klik disini.
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>