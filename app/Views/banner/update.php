<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>taiba travel</title>
    <link rel="icon" href="<?= base_url() ?>/img/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/nice-select.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
</head>

<body>
    <!-- hearder start -->
    <?php
    include 'page_navbar/user-navbar.php';
    ?>
    <section class="banner_part">
        <div class="container">
            <?php
            $nama = [
                'name' => 'nama',
                'id' => 'nama',
                'value' => $banner->nama,
                'class' => 'form-control',
            ];

            $harga = [
                'name' => 'harga',
                'id' => 'harga',
                'value' => $banner->harga,
                'class' => 'form-control',
                'type' => 'number',
                'min' => 0,
            ];

            $stok = [
                'name' => 'stok',
                'id' => 'stok',
                'value' => $banner->stok,
                'class' => 'form-control',
                'type' => 'number',
                'min' => 0,
            ];

            $gambar = [
                'name' => 'gambar',
                'id' => 'gambar',
                'value' => null,
                'class' => 'form-control',
            ];

            $lama_tour = [
                'name' => 'lama_tour',
                'id' => 'lama_tour',
                'value' => $banner->lama_tour,
                'class' => 'form-control',
                'type' => 'number',
                'min' => 0,
            ];

            $deskripsi = [
                'name' => 'deskripsi',
                'id' => 'deskripsi',
                'value' => $banner->deskripsi,
                'class' => 'form-control',
            ];

            $id_kategori = [
                'name' => 'id_kategori',
                'class' => 'form-control',
                'options' => $arrayKategori,
                'selected' => null,
            ];
            $submit = [
                'name' => 'submit',
                'id' => 'submit',
                'value' => 'Submit',
                'class' => 'btn btn-warning',
                'type' => 'submit',
            ];

            ?>
            <div class="card">
                <div class="card-header">
                    <h1>Tambah banner</h1>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('banner/update/' . $banner->id) ?>
                    <div class="form-group">
                        <?= form_label("Nama", "nama") ?>
                        <?= form_input($nama) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label("Harga", "harga") ?>
                        <?= form_input($harga) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label("Stok", "stok") ?>
                        <?= form_input($stok) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label("Lama Tour", "lama_tour") ?>
                        <?= form_input($lama_tour) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label("Deskripsi", "deskripsi") ?>
                        <?= form_input($deskripsi) ?>
                    </div>

                    <div class="form-group">
                        <?= form_label("Kategori", "kategori") ?>
                        <?= form_input($kategori) ?>
                    </div>

                    <img class="img-fluid" alt="image" src="<?= base_url('uploads/' . $banner->gambar) ?>" />

                    <div class="form-group">
                        <?= form_label("Gambar", "gambar") ?>
                        <?= form_upload($gambar) ?>
                    </div>

                    <div class="text-right">
                        <?= form_submit($submit) ?>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>


    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?= base_url() ?>/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?= base_url() ?>/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url() ?>/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="<?= base_url() ?>/js/jquery.magnific-popup.js"></script>
    <!-- particles js -->
    <script src="<?= base_url() ?>/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="<?= base_url() ?>/js/slick.min.js"></script>
    <script src="<?= base_url() ?>/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/js/contact.js"></script>
    <script src="<?= base_url() ?>/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url() ?>/js/jquery.form.js"></script>
    <script src="<?= base_url() ?>/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/js/mail-script.js"></script>
    <!-- custom js -->
    <script src="<?= base_url() ?>/js/custom.js"></script>
</body>

</html>