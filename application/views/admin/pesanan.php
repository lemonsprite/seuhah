<div class="page-title">
    <h3>Pesanan</h3>
    <p class="text-subtitle text-muted">Tampilan pengelolaan pesanan</p>

</div>
<section class="section">

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Nomor Invoice</th>
                                    <th>Pemesan</th>
                                    <th>Waktu Pesan</th>
                                    <th>Total Bayar</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as  $u) : ?>
                                    <tr>
                                        <td><a class="btn btn-sm btn-light" href="<?= base_url("admin/pesanan/{$u->no_invoice}")?>"><?= $u->no_invoice ?></a></td>
                                        <td class="text-bold-500"><?= $u->nama_depan ?> <?= $u->nama_belakang ?></td>
                                        <td><?= date('d-m-Y', $u->waktu_pesan) ?></td>
                                        <td>Rp <?= number_format($u->total_bayar, 0, ',', '.') ?></td>
                                        <td><img class="pop" src="<?= base_url("assets/uploads/bukti/{$u->bukti}") ?>" width="100" height="100"></td>
                                        <td>
                                            <?php if ($u->status == 4) : ?>
                                                <a class="btn btn-sm btn-dark" href="javascript:void(0)">Dibatalkan</a>
                                            <?php elseif ($u->status == 3) : ?>
                                                <a class="btn btn-sm btn-dark" href="javascript:void(0)">Ditolak</a>
                                            <?php elseif ($u->status == 2) : ?>
                                                <a class="btn btn-sm btn-dark" href="javascript:void(0)">Selesai Dikirim</a>
                                            <?php elseif ($u->status == 1) : ?>
                                                <a onclick="confirm('Yakin konfirmasi pembayaran <?= $u->no_invoice ?>?')" class="btn btn-sm btn-warning" href="<?= base_url("admin/pesanan/{$u->id_invoice}/terima") ?>"><i data-feather="check" width="20"></i></a>
                                                <a onclick="confirm('Yakin hapus tolak pesanan <?= $u->no_invoice ?>?')" class="btn btn-sm btn-danger" href="<?= base_url("admin/pesanan/{$u->id_invoice}/tolak") ?>"><i data-feather="x" width="20"></i></a>
                                            <?php elseif ($u->status == 0) : ?>
                                                <a class="btn btn-sm btn-dark" href="javascript:void(0)">Bukti Kosong</a>
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

</section>

<div id="imagemodal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Image preview</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body position-relative">
                <img src="" id="imagepreview" class='w-100'>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(".pop").on("click", function() {
        $('#imagepreview').attr('src', $('.pop').attr('src')); // here asign the image to the modal when the user click the enlarge link
        $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
    });
</script>