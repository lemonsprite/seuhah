<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 70vh;">
        <div class="col-md-6">
            <div class="card text-center mt-5">
                <?= form_open_multipart(base_url("riwayat/upload/{$id}"))?>
                    <div class="card-body">
                        <h5 class="card-title">Silahkan Upload Bukti Bayar</h5>
                        <div class="form-group mb-3 mt-4">
                            <input name="id_invoice" class="form-control" value="<?= $id ?>" hidden>
                            <input name="bukti" type="file" class="form-control" enctype="multipart/form-data">
                            <small class="text-danger">Ekstensi yang diperbolehkan: JPG, JPEG, PNG</small>
                        </div>
                        <div>
                            
                        </div>
                        <button href="javascript:void(0)" class="btn btn-sm btn-primary btn-block" type="submit">Kirim</button>
                    </div>
                <?= form_close(); ?>
            </div>

        </div>
    </div>
</div>