<div class="main-content container fluid">
    <div class="row pt-5">
        <div class="col-md-8 col-xl-8">
            <div class="card card-border bg-white border-light shadow-md mb-4">
                <div class="card-body">
                    <h4 class="mb-5 h-4">Informasi Dasar</h4>
                    <form action="<?= base_url('home/profil') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">Nama Depan</label>
                                    <input class="form-control" name="namaDepan" type="text" placeholder="Masukan nama depan" value="<?= $user->nama_depan ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="last_name">Nama Belakang</label>
                                    <input class="form-control" name="namaBelakang" type="text" placeholder="Masukan nama belakang" value="<?= $user->nama_belakang ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12 mb-3">
                                <label for="birthday">Alamat Email</label>
                                <input name="email" class="form-control" placeholder="Masukan alamat email" value="<?= $user->email ?>" disabled>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between w-100 align-items-center my-4">
                            <h4 class="m-0">
                                Password
                            </h4>
                            <a href="javascript:void(0)" id="pwdToggle" class="btn btn-sm p-2 btn-outline-dark w-auto h-50" tabindex="-1" disabled><span class="me-3">Edit</span><i class="fas fa-edit"></i></a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="pass1" class="password form-control" type="password" placeholder="Masukan password baru" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Verifikasi Password</label>
                                    <input name="pass2" class="password form-control" type="password" placeholder="Verifikasi password baru" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                    <script>
                        $('#pwdToggle').click(function() {

                            $(".password").prop("disabled", (_, val) => !val);
                        })
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-4">
            <div class="row">
                <div class="col-12">
                    <div class="card border-light text-center p-0">
                        <div class="profile-cover rounded-top" data-background="https://appsrv1-147a1.kxcdn.com/volt-dashboard/img/profile-cover.jpg" style="background: url(&quot;https://appsrv1-147a1.kxcdn.com/volt-dashboard/img/profile-cover.jpg&quot;);"></div>
                        <div class="card-body pb-5">
                            <div class="fotouser mb-4">
                                <img id="item-img-output" class="gambar rounded-circle img-fluid shadow" src="<?= base_url("assets/uploads/users/{$user->foto}") ?>">
                            </div>
                            <h4 class="h3">
                                <?= $user->nama_depan ?> <?= $user->nama_belakang ?>
                            </h4>
                            <h5 class="font-weight-normal mb-4">
                                <?= $user->email ?>
                            </h5>
                            <!-- <p class="text-gray mb-4">New York, USA</p> -->
                            <a id="uploadpreview" class=" btn btn-sm btn-secondary btn-block" href="javascript:void(0)">Ubah Foto Profil</a>
                            <input id="inputnewFoto" type="file" class="form_control item-img " hidden>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cropImagePop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="upload-demo" class="center-block"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="cropImageBtn" type="button" class="btn btn-primary">Crop</button>
      </div>
    </div>
  </div>
</div>
<div id="fotoCrop"></div>
<script>
    $(document).ready(function() {

        $('#uploadpreview').click(function() {
            $('#inputnewFoto').trigger('click');
        });

        // Start upload preview image
        
        var $uploadCrop,
            tempFilename,
            rawImg,
            imageId;

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.upload-demo').addClass('ready');
                    $('#cropImagePop').modal('show');
                    rawImg = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
            },
            boundary: {
                width: 250,
                height: 250
            },
            showZoomer: false
        });

        $('#cropImagePop').on('shown.bs.modal', function() {
            // alert('Shown pop');
            $uploadCrop.croppie('bind', {
                url: rawImg
            }).then(function() {
                console.log('jQuery bind complete');
            });
        });

        $('.item-img').on('change', function() {
            imageId = $(this).data('id');
            tempFilename = $(this).val();
            $('#cancelCropBtn').data('id', imageId);
            readFile(this);
        });

        $('#cropImageBtn').on('click', function(ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                // $('#item-img-output').attr('src', resp);
                $.ajax({
                    url: "<?= base_url('home/upload_avatar') ?>",
                    method: 'post',
                    data: {
                        img: resp,
                        currFoto: "<?= $user->foto ?>"
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        console.log(data.foto);
                        
                        var url = "<?= base_url("assets/uploads/users/")?>" + data.foto
                        $('#item-img-output').attr('src', url );
                        $("#avatar").attr("src", url);
                    }
                });
                $('#cropImagePop').modal('hide');
            });
        });
        // End upload preview image
    });
</script>