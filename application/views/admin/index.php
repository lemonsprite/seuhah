<div class="page-title">
    <h3>Dashboard</h3>
    <p class="text-subtitle text-muted">Ringkasan data bisnis</p>
</div>
<section class="section">
    <div class="row mb-2">
        <div class="col-12 col-md-4">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>USER</h3>
                            <div class="card-right d-flex align-items-center">
                                <p><?= $memberCount ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>PRODUK</h3>
                            <div class="card-right d-flex align-items-center">
                                <p><?= $produkCount ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>TRANSAKSI</h3>
                            <div class="card-right d-flex align-items-center">
                                <p><?= $invoiceCount ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-cente">
                    <h3 class='card-heading'>Users</h3>
                    <a class="btn btn-sm btn-primary" href="<?= base_url('admin/users')?>">Lihat Semua Pesanan</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($member as  $u) : ?>
                                    <tr>
                                        <td class="text-bold-500"><?= $u->nama_depan ?> <?= $u->nama_belakang ?></td>
                                        <td><?= $u->email ?></td>
                                        <td><?= $u->role ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between items-align-center">
                    <h3 class='card-heading m-0'>Pesanan</h3>
                    <a class="btn btn-sm btn-primary" href="<?= base_url('admin/pesanan')?>">Lihat Semua Pesanan</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>No Invoice</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nominal</th>
                                    <th>Waktu Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as $p) : ?>
                                    <tr>
                                        <td class="text-bold-500"><?= $p->no_invoice ?></td>
                                        <td><?= $p->nama_depan ?> <?= $p->nama_belakang ?></td>
                                        <td>Rp. <?= number_format($p->total_bayar, 0, ',', '.') ?></td>
                                        <td><?= date('d-m-Y', $p->waktu_pesan) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>