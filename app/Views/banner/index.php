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
        <div class="container padding_top padding_bottom">
            <div class="row">
                <div class="card mx-auto">
                    <div class="card-header">
                        <h4>List Tour</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>banner</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Lama Tour</th>
                                <!-- <th>Jenis Tour</th> -->
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($banners as $index => $banner) : ?>
                                    <tr>
                                        <td><?= ($index + 1) ?></td>
                                        <td><?= $banner->nama ?></td>
                                        <td>
                                            <img class="img-fluid" width="200px" alt="gambar" src="<?= base_url('uploads/' . $banner->gambar) ?>" />
                                        </td>
                                        <td><?= $banner->harga ?></td>
                                        <td><?= $banner->stok ?></td>

                                        <td><?= $banner->lama_tour ?> hari</td>
                                        <td><?= $banner->deskripsi ?></td>
                                        <td class="">
                                            <a href="<?= site_url('banner/view/' . $banner->id) ?>" class="d-flex btn btn-warning my-2 font_table">View</a>
                                            <a href="<?= site_url('banner/update/' . $banner->id) ?>" class="d-flex btn btn-primary my-2 font_table">Update</a>
                                            <a href="<?= site_url('banner/delete/' . $banner->id) ?>" class="d-flex btn btn-danger my-2 font_table">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
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