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
    <script type="text/javascript" src="<?= base_url() ?>/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/js/jquery-1.12.1.min.js"></script>
</head>

<body>
    <?= $this->include('navbar') ?>
    <?= $this->renderSection('content') ?>
    <!-- jquery plugins here-->
    <!-- jquery -->

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

    <?= $this->renderSection('script') ?>
</body>

</html>