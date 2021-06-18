<div class="overlay fixed top-0 w-screen h-screen hidden"></div>
    <section class="sidebar-cart w-2/6 fixed hidden -right-96 top-0 h-screen shadow-lg transition-all transition-75">
        <div class="wrapper bg-white h-full flex-row">
            <div class="p-4 shadow-sm">
                <button class="mb-5 focus:outline-none" onclick="cart_close()"><i class="fas fa-times text-xl"></i></button>
                <h1 class="font-bold text-2xl pb-2 ">Keranjang Belanja</h1>
            </div>
            <div class="cart-wrap px-4">
                <ul class="py-5">
                    <li class="flex items-center justify-between p-1 mb-1">
                        <h4 class="font-bold text-md">Item #001</h4>
                        <div class="flex">
                            <h6 class="px-5 item-count">0</h6>
                            <h6 class="px-5 subtotal">0</h6>
                            <button class="ml-2 focus:outline-none px-3 pb-1 rounded-md bg-red-500"><i class="fas fa-trash text-xs text-white"></i></button>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <div class='px-4 py-2 relative '>
                <ul class="border-t w-full px-2 py-4">
                    <li class="grid-cols-6 grid">
                        <p class="col-span-3">Subtotal Produk</p>
                        <p class="text-right">Rp.</p>
                        <p class="text-right col-span-2">1.000.000.000,00</p>
                    </li>
                    <li class="grid-cols-6 grid">
                        <p class="col-span-3">Biaya Pengiriman</p>
                        <p class="text-right">Rp.</p>
                        <p class="text-right col-span-2">1.000.000.000,00</p>
                    </li>
                    <li class="grid-cols-6 grid">
                        <p class="col-span-3">Potongan Harga</p>
                        <p class="text-right">Rp.</p>
                        <p class="text-right col-span-2">1.000.000.000,00</p>
                    </li>
                    <li class="grid-cols-6 grid font-bold">
                        <p class="col-span-3 font-current">Total Biaya</p>
                        <p class="text-right">Rp.</p>
                        <p class="text-right col-span-2">1.000.000.000,00</p>
                    </li>
                </ul>
                <button class="block bg-gray-700 w-full px-4 py-2 rounded-md text-white font-bold tracking-wide">Selesaikan Transaksi</button>
            </div>
        </div>
    </section>