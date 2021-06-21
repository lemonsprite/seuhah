<div class="page-title">
    <h3>Users</h3>
    <p class="text-subtitle text-muted">Tampilan pengelolaan users</p>
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
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($member as  $u) : ?>
                                    <tr>
                                        <td class="text-bold-500"><?= $u->nama_depan ?></td>
                                        <td class="text-bold-500"><?= $u->nama_belakang ?></td>
                                        <td><?= $u->email ?></td>
                                        <td><?= $u->role ?></td>
                                        <td>
                                            
                                            <a onclick="{ confirm('Takin menghapus data ini?')}" class="btn btn-sm btn-danger" href="<?= base_url("admin/users/{$u->id_user}/hapus")?>"><i data-feather="trash-2" width="20"></i></a>
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