<section class="section">
    <div class="container-fluid py-5">

        <div class="container text-center">
            <h3 class="mb-5">Riwayat Transaksi</h3>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Invoice</th>
                                            <th>Alamat</th>
                                            <th>Total Bayar</th>
                                            <th>Waktu Pesan</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pesanan as  $u) : ?>
                                            <tr>
                                                <td><?= $u->no_invoice ?></td>
                                                <td><?= $u->alamat_pengiriman ?></td>
                                                <td>Rp <?= number_format($u->total_bayar, 0, ',', '.') ?></td>
                                                <td><?= date('d-m-Y', $u->tgl_buat) ?></td>
                                                <td>
                                                    <?php if ($u->status == 4) : ?>
                                                        <a class="btn btn-sm btn-dark" href="javascript:void(0)">Dibatalkan</a>
                                                    <?php elseif ($u->status == 3) : ?>
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-danger" href="javascript:void(0)">Ditolak</a>
                                                            <a class="btn btn-sm btn-warning" href="<?= base_url("riwayat/{$u->id_invoice}/konfirmasi") ?>">Upload Ulang</a>
                                                        </div>
                                                    <?php elseif ($u->status == 2) : ?>
                                                        <a class="btn btn-sm btn-dark" href="javascript:void(0)" disabled>Sudah Dikirim</a>
                                                    <?php elseif ($u->status == 1) : ?>
                                                        <a class="btn btn-sm btn-dark" href="javascript:void(0)" disabled>Menunggu Verifikasi</a>
                                                    <?php elseif ($u->status == 0) : ?>
                                                        <a class="btn btn-sm btn-warning" href="<?= base_url("riwayat/{$u->id_invoice}/konfirmasi") ?>">Upload Bukti</a>
                                                    <?php endif; ?>
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

</section>