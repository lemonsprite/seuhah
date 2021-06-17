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
                                    <th>Pemesan</th>
                                    <th>Nomor Invoice</th>
                                    <th>Waktu Pesan</th>
                                    <th>Total Bayar</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as  $u) : ?>
                                    <tr>
                                        <td class="text-bold-500"><?= $u->nama_depan ?> <?= $u->nama_belakang ?></td>
                                        <td><?= $u->no_invoice ?></td>
                                        <td><?= $u->waktu_pesan ?></td>
                                        <td><?= $u->total_bayar ?></td>
                                        <td><?= $u->bukti ?></td>
                                        <td><?= $u->status ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="javascript:void(0)"><i data-feather="edit-2" width="20"></i></a>
                                            <a class="btn btn-sm btn-danger" href="javascript:void(0)"><i data-feather="trash-2" width="20"></i></a>
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