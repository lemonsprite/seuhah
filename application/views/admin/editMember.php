<div class="h-full ml-14 mt-14 mb-10 md:ml-64">

    <div class="grid grid-cols lg:grid-cols p-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="flex flex-wrap items-center p-4">
                <div class="relative w-full max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-50">Ubah Data Member</h3>
                </div>
            </div>
            <div class="bg-white p-4">
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Nama Depan
                            </label>
                            <input name="namaDep" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Nama Depan">
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Nama Belakang
                            </label>
                            <input name="namaBel" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Nama Belakang">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Email
                            </label>
                            <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Email">
                            <!-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> -->
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Password
                            </label>
                            <input name="pwd1" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password" placeholder="Password">
                            <!-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> -->
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Verifikasi Password
                            </label>
                            <input name="pwd2" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password" placeholder="Verifikasi Password">
                            <!-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> -->
                        </div>
                    </div>

                    <button class="px-4 bg-green-500 py-2 float-right mb-3 rounded-lg text-white hover:bg-green-400">Ubah Data</button>
                    <a class="px-4 bg-blue-500 py-2 float-right mb-3 rounded-lg text-white hover:bg-blue-400 mr-4 cursor-pointer" href="<?= base_url('admin/member') ?>">Kembali</a>
                </form>
            </div>

        </div>
    </div>
</div>