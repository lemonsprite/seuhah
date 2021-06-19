<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/js/croppie.js') ?>"></script>
<script src="<?= base_url('assets/js/feather.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/perfect-scrollbar.min.js') ?>"></script> -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/Chart.min.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/dashboard.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script> -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>


<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('keranjang/load') ?>",
            success: function(data) {
                res = JSON.parse(data);
                console.log(JSON.parse(data));

                // Icon Tas Belanja Harga
                $('#tasbelanja').html(new Intl.NumberFormat('de-DE').format(res['total']));

                // Cart Konten
                var html = '';
                for (const key in res['data']) {
                    if (res['data'].hasOwnProperty(key)) {
                        // console.log(`${key} : ${res[key]['name']}`)
                        html +=
                            `<li class='list-group-item list-group-item-action py-3 lh-tight' aria-current='true'>` +
                            `<div class='d-flex w-100 align-items-center justify-content-between'>` +
                            `<strong class='mb-1 fs-5'>${res['data'][key]['name']}</strong>` +
                            `<small><span class='fs-4'>${res['data'][key]['qty']}</span>x</small>` +
                            `</div>` +
                            `<div class='d-flex w-100 align-items-center justify-content-between'>` +
                            `<div class='mb-1 small fs-6'>Rp ${new Intl.NumberFormat('de-DE').format(res['data'][key]['price'])}</div>` +
                            `<strong><span class='fs-5'>Rp ${new Intl.NumberFormat('de-DE').format(res['data'][key]['subtotal'])}</strong>` +
                            `</div>` +
                            `</li>`;
                    }
                }
                $('.cart-konten').html(html);

                // Icon Badge
                $('#countTas').html(res['count']);

                // Icon Badge
                $('#totalBayar').html(new Intl.NumberFormat('de-DE').format(res['total']));
            }

        })
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
                    console.log(JSON.parse(data));

                    // Icon Tas Belanja Harga
                    $('#tasbelanja').html(new Intl.NumberFormat('de-DE').format(res['total']));

                    // Cart Konten
                    var html = '';
                    for (const key in res['data']) {
                        if (res['data'].hasOwnProperty(key)) {
                            // console.log(`${key} : ${res[key]['name']}`)
                            html +=
                                `<li class='list-group-item list-group-item-action py-3 lh-tight' aria-current='true'>` +
                                `<div class='d-flex w-100 align-items-center justify-content-between'>` +
                                `<strong class='mb-1 fs-5'>${res['data'][key]['name']}</strong>` +
                                `<small><span class='fs-4'>${res['data'][key]['qty']}</span>x</small>` +
                                `</div>` +
                                `<div class='d-flex w-100 align-items-center justify-content-between'>` +
                                `<div class='mb-1 small fs-6'>Rp ${new Intl.NumberFormat('de-DE').format(res['data'][key]['price'])}</div>` +
                                `<strong><span class='fs-5'>Rp ${new Intl.NumberFormat('de-DE').format(res['data'][key]['subtotal'])}</strong>` +
                                `</div>` +
                                `</li>`;
                        }
                    }
                    $('.cart-konten').html(html);

                    // Icon Badge
                    $('#countTas').html(res['count']);

                    // Icon Badge
                    $('#totalBayar').html(new Intl.NumberFormat('de-DE').format(res['total']));
                }
            });
        });
    });
</script>
</body>


</html>