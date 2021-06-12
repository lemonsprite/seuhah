<div class="h-full ml-14 mt-14 mb-10 md:ml-64">

    <div class="p-4">
        <h1 class="text-2xl">KELOLA USERS</h1>
        
    </div>
    <div class="grid grid-cols lg:grid-cols p-4">
        <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
                <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Daftar Member</h3>
                    </div>
                    <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                        <a href='javascript:void(0)' class="modal-open bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Tambah Member</a>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table id='member' class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Nama Depan</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Nama Belakang</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Email</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Role</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Tanggal Bergabung</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Terakhir Diubah</th>
                                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($member as $m) : ?>
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left font-bold"><?= $m->nama_depan ?></td>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 font-bold"><?= $m->nama_belakang ?></td>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= $m->email ?></td>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= $m->nama ?></td>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= date('l, d F Y', $m->tgl_buat) ?></td>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= date('l, d F Y', $m->tgl_edit) ?></td>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="grup-btn">
                                            <a href="<?= base_url("admin/edit_user/{$m->id_user}") ?>" class="bg-yellow-400 px-2 py-1">Edit</a>
                                            <a href="<?= base_url("admin/hapus_user/{$m->id_user}") ?>" class="bg-red-400 px-2 py-1">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
<!-- Modal Area -->
<div class="modal opacity-0 pointer-events-none fixed w-screen h-screen top-0 left-0 flex overflow-y-none justify-center z-50">
    <div class="modal-overlay absolute w-screen h-screen bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-2xl mx-auto rounded shadow-lg z-50 overflow-y-auto dark:bg-gray-900 my-10">
        <form class="" action="<?= base_url('admin/tambah_user') ?>" method="POST">
            <!--Title-->
            <div class="flex justify-between items-center pb-3 sticky top-0 py-4 px-6 bg-white dark:bg-gray-900 shadow-md">
                <p class="text-2xl font-bold">Tambah User</p>

                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">

                <!--Body-->
                <div class="pt-4">

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

                </div>
            </div>

            <!--Footer-->
            <div class="flex justify-end pt-2 sticky bottom-0 py-4 px-6 bg-white dark:bg-gray-900 border-t">

                <button class="px-4 bg-green-500 py-2 rounded-lg text-white hover:bg-green-400 " type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>