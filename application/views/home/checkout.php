<main>
    <div class="py-5 text-center">
        <h2>Checkout form</h2>
    </div>
    <div class="container">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Keranjang Anda</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Nama produk</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0 fw-bold">Ongkos kirim</h6>
                        </div>
                        <strong>$12</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0 fw-bold">Total belanja</h6>
                        </div>
                        <strong>$12</strong>
                    </li>
                </ul>

            
            </div>

            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3 text-primary">Alamat pengihan</h4>
                <form class="needs-validation" action="<?php echo base_url('home/pesan_commit'); ?>" method="POST"> 
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        </div>


                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Masukan alamat pengiriman
                            </div>
                        </div>


                    <h4 class="mb-3 text-primary">Silahkan pilih metode pembayaran</h4>

                    <!-- Example split danger button -->
                    <!-- Example single danger button -->
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="pilih">
                        <datalist id="datalistOptions">
                        <option value="OVO - 083826718501">
                        <option value="DANA - 089668087015">
                        <option value="BRI - 1213242321">
                        <option value="BCA - 293992888">
                    </datalist>
                     <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg mb-5" type="submit">Lanjutkan checkout</button>
                </form>
            </div>
        </div>
    </div>

</main>