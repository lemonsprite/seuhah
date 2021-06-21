<main>
    <div class="py-5 text-center">
        <h2>Form Checkout</h2>
    </div>
    <div class="container">
        <div class="row g-5">
            <!-- Karanjang -->
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Keranjang Anda</span>
                    <span class="badge bg-primary rounded-pill"><?= count($cart) ?></span>
                </h4>
                <ul class="list-group mb-3">

                    <?php foreach ($cart as $c) : ?>
                        <!-- <?= var_dump($c) ?> -->
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><strong><?= $c['name'] ?></strong> (<?= $c['qty'] ?>x)</h6>
                                <small class="text-muted"></small>
                            </div>
                            <span class="text-muted">Rp <?= number_format($c['subtotal'], 0, ',', '.') ?></span>
                        </li>
                    <?php endforeach; ?>
                    
                </ul>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0 fw-bold">Subtotal belanja</h6>
                        </div>
                        <strong>Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0 fw-bold">Ongkos kirim</h6>
                        </div>
                        <strong>Rp <?= number_format($ongkir, 0, ',', '.') ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0 fw-bold">Total belanja</h6>
                        </div>
                        <strong>Rp <?= number_format($total, 0, ',', '.') ?></strong>

                    </li>
                </ul>


            </div>


            <!-- Form -->
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3 text-primary">Alamat pengihan</h4>
                <form class="needs-validation" action="<?php echo base_url('tagihan'); ?>" method="POST">
                    <input name="total" value="<?= $total ?>">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label>Nama Depan</label>
                            <input name="namaDepan" class="form-control" placeholder="" value="<?= $user->nama_depan ?>" readonly>
                        </div>

                        <div class="col-sm-6">
                            <label>Nama Belakang</label>
                            <input name="namaBelakang" class="form-control" placeholder="" value="<?= $user->nama_belakang ?>" readonly>
                        </div>


                        <div class="col-12">
                            <label>Nama Belakang</label>
                            <input name="email" class="form-control" value="<?= $user->email ?>" readonly>
                        </div>

                        <div class="col-12">
                            <label for="alamat">Alamat</label>
                            <input name="alamat" class="form-control" placeholder="Masukan alamat..">
                        </div>


                        <h4 class="mb-3 mt-4 text-primary">Silahkan pilih metode pembayaran</h4>

                        <!-- Example split danger button -->
                        <!-- Example single danger button -->
                        <div class="col-12">
                            <select name="metode" class="form-select">
                                <?php foreach ($rekening as $r) : ?>
                                    <option value="<?= $r['norek'] ?>"><?= $r['bank'] ?></option>
                                <?php endforeach; ?>

                            </select>

                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg mb-5" type="submit">Lanjutkan checkout</button>
                </form>
            </div>
        </div>
    </div>

</main>