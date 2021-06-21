<div class="page-title">
    <h3>Pesanan #<?= $id ?></h3>
    <p class="text-subtitle text-muted"><?= count($pesanan)?> Item</p>

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
                                    <th>Nama Item</th>
                                    <th>Harga Item</th>
                                    <th>Kuantitas</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as  $u) : ?>
                                    <tr>
                                        
                                        <td><?= $u->nama_produk ?></td>
                                        <td>Rp <?= number_format($u->harga,0,',','.') ?></td>
                                        <td><?= $u->qty ?> Item</td>
                                        <td><strong>Rp <?= number_format($u->subtotal,0,',','.') ?></strong></td>
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