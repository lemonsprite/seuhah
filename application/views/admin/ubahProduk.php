<div class="page-title mb-5">
    <h3>Ubah Produk</h3>
</div>
<section class="section">

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="m-0 p-0">Form Isian</h4>
                    </div>
                </div> -->
                <form class="card-body p-4" action="<?= base_url('admin/update_produk') ?>" method="POST">
                    <input name="id_produk" value="<?= $produk->id_produk ?>" hidden>
                    <input name="currFoto" value="<?= $produk->foto ?>" hidden>
                    <input id="fotoCrop" name="foto" value="">
                    <div class="row gx-5">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Nama Produk</label>
                                    <input name="namaProduk" class="form-control" value="<?= $produk->nama_produk ?>">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Kode Produk</label>
                                    <input name="kodeProduk" class="form-control" value="<?= $produk->kode_produk ?>" readonly>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Rp</span>
                                        <input name="hargaProduk" class="form-control" value="<?= $produk->harga ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <labelclass="form-label">Deskripsi Produk</label>
                                        <textarea name="deskripsiProduk" maxlength="255" class="form-control" rows="4"><?= $produk->deskripsi_produk ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Ubah Gambar Produk</label>
                            <input id="upload" type="file" class="form-control mb-4">
                            <div id="preview" width='100px'></div>

                        </div>
                    </div>
                    <div class="pt-4 d-flex justify-content-end btn-group">
                        <button type="submit" class="btn btn-warning">Update Produk</button>
                        <a class="btn btn-primary ml-4" href="javascript:history.back()" onclick="return confirm('Data yang anda input akan hilang, Apa anda yakin?')">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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
        uploadCrop.croppie('bind', {
            url: '<?= base_url("assets/uploads/{$produk->foto}") ?>'
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

            $('#preview').on('update.croppie', function(ev, cropData) {
                uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(resp) {
                    // console.log(resp);
                    $('#fotoCrop').val(resp);
                })
            });

        });


    });
</script>