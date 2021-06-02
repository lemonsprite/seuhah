<body>
    <!-- component -->
    <!-- This is an example component -->
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
            <div class="relative sm:max-w-sm w-full">
                <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6">
                </div>
                <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6">
                </div>
                <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                    <div class="text-center">
                        <h1 class="font-bold text-2xl mb-2">Kedai Seuhah</h1>
                        <p class="text-lg">Masuk dengan akun anda.</p>
                        <?=$this->session->flashdata('pesan');?>
                    <form method="POST" action="<?= base_url('proses/masuk') ?>" class="mt-10">
                        <div>
                            <input name='email' type="email" placeholder="Email" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none px-4">
                        </div>

                        <div class="mt-7">
                            <input type="password" placeholder="Password" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0 focus:outline-none px-4">
                        </div>

                        <div class="mt-7 flex">
                            <!-- <label for="remember_me" class="inline-flex items-center w-full cursor-pointer">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">
                                    Recuerdame
                                </span>
                            </label> -->

                            <!-- <div class="w-full text-left">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                                    Sudah punya akun?
                                </a>
                            </div> -->
                        </div>

                        <div class="mt-7">
                            <button
                                class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Login
                            </button>
                        </div>

                        

                        <div class="mt-7">
                            <div class="flex justify-center items-center">
                                <label class="mr-2">Belum punya akun? </label>
                                <a href="<?= base_url('register') ?>"
                                    class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
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