<div class="page-title">
    <h3>Produk</h3>
    <p class="text-subtitle text-muted">Tampilan pengelolaan produk</p>
</div>
<section class="section">

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="m-0 p-0">Tabel Produk</h4>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#produk">Tambah Produk</a>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table mb-0 datatables">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($produk as  $u) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td class="text-bold-500"><?= $u->kode_produk ?></td>
                                        <td><?= $u->nama_produk ?></td>
                                        <td><?= $u->harga ?></td>
                                        <td><img src="<?= base_url("assets/uploads/{$u->foto}") ?>" height="50"></td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href='<?= base_url("admin/edit_produk/{$u->id_produk}")?>'><i data-feather="edit-2" width="20"></i></a>
                                            <a class="btn btn-sm btn-danger" onclick="return confirm('Apa anda yakin menghapus data ini?')" href='<?= base_url("admin/hapus_produk/{$u->id_produk}")?>'><i data-feather="trash-2" width="20"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="produk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form id="form_produk" class="modal-content" action="<?= base_url('admin/tambah_produk') ?>" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input name="namaProduk" class="form-control" placeholder="Masukan nama produk.." required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input name="hargaProduk" type="number" class="form-control" placeholder="Masukan harga produk.." required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Produk</label>
                    <input id="upload" type="file" class="form-control mb-2" required>
                    <div id="preview"></div>
                </div>
                <input id="fotoCrop" name='foto' hidden>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary upload-result">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        uploadCrop = $('#preview').croppie({
            enableExif: true,
            viewport: {
                width: 324,
                height: 200,
            },
            boundary: {
                width: 350,
                height: 225
            },
            showZoomer: false,

        });

        $('#upload').on('change', function() {
            var foto = new FileReader();
            foto.onload = function(e) {
                uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });

            }
            foto.readAsDataURL(this.files[0]);

            
        });

        $('#preview').on('update.croppie', function(ev, cropData) {
            uploadCrop.croppie('result', {
                type: 'canvas',
		        size: 'viewport'
            }).then(function (resp) {
                // console.log(resp);
                $('#fotoCrop').val(resp);
            })
        });


    });
</script>