<div class="toast-container position-fixed top-0 start-0 p-3" style="z-index: 20000">
    <?php if ($this->session->tempdata('pesan') != NULL) : ?>
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <strong class="me-auto">Kedai Seuhah</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $this->session->tempdata('pesan') ?>
            </div>
        </div>
    <?php endif; ?>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/js/croppie.js') ?>"></script>
<script src="<?= base_url('assets/js/feather.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/perfect-scrollbar.min.js') ?>"></script> -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/Chart.min.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/dashboard.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script> -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>


<script>
    function load(res) {
        // Icon Tas Belanja Harga
        $('#tasbelanja').html(new Intl.NumberFormat('de-DE').format(res['total']));

        // Cart Konten
        // console.log(res);


        var html = '';
        for (var k in res.data) {
            // console.log(k, res.data[k])
            // console.log(`${key} : ${res[key]['name']}`)
            html +=
                `<li class='list-group-item py-3 lh-tight'>` +
                `<div class='row p-0'>` +
                `<div class='col-md-8'>` +
                `<div class='d-flex w-100 align-items-center justify-content-between'>` +
                `<strong class='mb-1 fs-5'>${res.data[k].name}</strong>` +
                `<small><span class='fs-4'>${res.data[k].qty}</span>x</small>` +
                `</div>` +
                `<div class='d-flex w-100 align-items-center justify-content-between'>` +
                `<div class='mb-1 small fs-6'>Rp ${new Intl.NumberFormat('de-DE').format(res.data[k].price)}</div>` +
                `<strong><span class='fs-5'>Rp ${new Intl.NumberFormat('de-DE').format(res.data[k].subtotal)}</strong>` +
                `</div>` +
                `</div>` +
                `<div class='col-md-4 d-flex justify-content-end'>` +
                `<div class='btn-group'>` +
                `<div class='btn btn-group-vertical p-0'>` +
                `<button class='additem btn btn-sm btn-success p-2 rounded-0' data-row='${res.data[k].rowid}' data-qyt='${res.data[k].qty}'><i class='fas fa-plus'></i></button>` +
                `<button class='minitem btn btn-sm btn-warning p-2 rounded-0' data-row='${res.data[k].rowid}' data-qyt='${res.data[k].qty}'><i class='fas fa-minus'></i></button>` +
                `</div>` +
                `<button class='delitem btn btn-sm btn-danger px-3 rounded-0' data-row='${res.data[k].rowid}'><i class='fas fa-trash'></i></button>` +
                `</div>` +
                `</div>` +
                `</div>` +
                `</li>`;
        }
        $('.cart-konten').html(html);

        // Icon Badge
        $('#countTas').html(res['count']);

        // Icon Badge
        $('#totalBayar').html(new Intl.NumberFormat('de-DE').format(res['total']));
    }

    function notif(param) {
        var session = param;
        var html =
            `<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">` +
            `<div class="toast-header bg-info text-white">` +
            `<strong class="me-auto">Kedai Seuhah</strong>` +
            `<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>` +
            `</div>` +
            `<div class="toast-body">` +
            session.pesan +
            `</div>` +
            `</div>`;
        $('.toast-container').html(html);
        $('.toast').toast('show');
        console.log(html);
    }
    $(document).ready(function() {

        $('.toast').toast('show', {
            delay: 200
        });

        $(document).on('click', '.delitem', function() {
            var rowid = $(this).data('row');

            $.ajax({
                url: "<?= base_url('keranjang/del') ?>",
                method: "POST",
                data: {
                    row_id: rowid
                },
                success: function(data) {
                    res = JSON.parse(data);
                    // console.log(JSON.parse(data));

                    load(res);
                    notif(res);
                }
            });
        });

        $(document).on('click', '.additem', function() {
            var rowid = $(this).data('row');
            var qyt = $(this).data('qyt');

            $.ajax({
                url: "<?= base_url('keranjang/plus') ?>",
                method: "POST",
                data: {
                    row_id: rowid,
                    qty: qyt + 1
                },
                success: function(data) {
                    res = JSON.parse(data);
                    // console.log(JSON.parse(data));
                    load(res);
                    notif(res);
                }
            });
        });
        $(document).on('click', '.minitem', function() {
            var rowid = $(this).data('row');
            var qyt = $(this).data('qyt');

            $.ajax({
                url: "<?= base_url('keranjang/min') ?>",
                method: "POST",
                data: {
                    row_id: rowid,
                    qty: qyt - 1
                },
                success: function(data) {
                    res = JSON.parse(data);
                    // console.log(JSON.parse(data));
                    load(res);
                    notif(res);
                }
            });
        });

        $.ajax({
            url: "<?= base_url('keranjang/load') ?>",
            success: function(data) {
                res = JSON.parse(data);
                // console.log(JSON.parse(data));

                load(res);
            }

        });


        $('.add-cart').click(function() {
            // fungsi tambah ke chart
            var produk_id = $(this).data("idproduk");
            var produk_nama = $(this).data("namaproduk");
            var produk_harga = $(this).data("harga");
            var quantity = 1;
            $.ajax({
                url: "<?= base_url('keranjang/add') ?>",
                method: "POST",
                data: {
                    id_produk: produk_id,
                    nama_produk: produk_nama,
                    harga: produk_harga,
                    qyt: quantity
                },
                success: function(data) {
                    res = JSON.parse(data);
                    // console.log(JSON.parse(data));
                    load(res);
                    notif(res);

                }
            });
        });


    });
</script>
</body>


</html>