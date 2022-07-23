<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1>Taiba Travel,</h1>
                        <h4 class="text-light">Sebuah travel yang berlokasi di kota Purwakarta.</h4>
                        <h4 class="text-light">Bersedia menemani anda dengan perjalanan yang nyaman dan aman.</h4>
                        <h2>Kenapa memilih kami??</h2>
                        <h4 class="pb-5 text-light">kami memiliki pengalaman dalam bidang travel selama hampir 10 tahun, dengan peserta
                            travel lebih dari 1000 orang! Meskipun pusat kami di Purwakarta, tapi kami melayani customer dari semua belahan Indonesia</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->


<!-- promo part start-->
<section id="promo">
    <div class="container py-5">
        <div class="row">
            <div class="promo_text col-6 mb-3 rounded mx-auto d-block">
                <h3>Program Promo</h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($modelpromo as $mp) : ?>
                <div class="col-md-4 col-sm-6">
                    <?php echo form_open(); ?>
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class=""><strong><?= $mp->nama ?></strong></h5>
                        </div>
                        <div class="card-body">
                            <img class="img-thumbnail" style="max-height: 200px" src="<?= base_url('uploads/' . $mp->gambar) ?>" />
                            <h6 class="mt-3" id="harga"><s><?= "Rp " . number_format($mp->harga, 2, ',', '.') ?></s></h6>
                            <h5 class="mt-3 text-danger"><?= "Rp " . number_format($mp->harga_diskon, 2, ',', '.') ?></h5>
                            <p class="text-info">Kuota : <?= $mp->stok ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= site_url('/daftar_diskon/' . $mp->id_promo) ?>" class="btn btn-primary">Daftar</a>
                            <a href="<?= site_url('promo/view/' . $mp->id_promo) ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</section>

<!-- promo part start-->

<!-- ***** banner section 1 start ***** -->
<section class="section" id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="cta-content">
                        <h2 class='pt-2'>Tahukah<em> kamu?</em></h2>
                        <p class="mt-1">Dalam pendapat Imam Syafii dan Imam Hambali menyatakan bahwa ibadah umroh hukumnya wajib untuk satu kali seumur hidup bagi yang mampu.</p>
                        <h3> Hayo! kalau sudah <em>mampu</em>, apalagi yang ditunda?</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** banner section 1 end ***** -->

<!-- international section-->
<section id="international_section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="promo_text mx-autod-block">
                <h3>International Tour</h3>
            </div>
        </div>
        <!-- banner international -->
        <div class="row">
            <?php foreach ($modelinter as $m) : ?>
                <div class="col-md-4 col-sm-6">
                    <?php echo form_open(); ?>
                    <div class="card text-center mt-5">
                        <div class="card-header">
                            <h5 class=""><strong><?= $m->nama ?></strong></h5>
                        </div>
                        <div class="card-body">
                            <img class="img-thumbnail" style="max-height: 200px" src="<?= base_url('uploads/' . $m->gambar) ?>" />
                            <h5 class="mt-3"><?= "Rp " . number_format($m->harga, 2, ',', '.') ?></h5>
                            <p class="text-info">Kuota : <?= $m->stok ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= site_url('/daftar/' . $m->id_banner) ?>" class="btn btn-primary">Daftar</a>
                            <a href="<?= site_url('banner/view/' . $m->id_banner) ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- international section end -->

<!-- ***** banner section 2 start ***** -->
<section class="section2" id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card cta-content">
                    <h2 class='pt-2'>Habis pusing-pusing emang paling oke <em>Refreshing!</em></h2>
                    <p class="mt-1">bahasa gaulnya jalan-jalan, yaitu healing! ayo healing-kan pikiran anda di dalam dan luar negeri bersama kami~!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** banner section 2 end***** -->


<!-- domestic  start-->
<section id="domestic_section">
    <div class="container py-5">
        <div class="row">
            <div class="promo_text col-6 mb-3 rounded mx-auto d-block">
                <h3>Domestic Tour</h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($modeldomestik as $md) : ?>
                <div class="col-md-4 col-sm-6">
                    <?php echo form_open(); ?>
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class=""><strong><?= $md->nama ?></strong></h5>
                        </div>
                        <div class="card-body">
                            <img class="img-thumbnail" style="max-height: 200px" src="<?= base_url('uploads/' . $md->gambar) ?>" />
                            <h5 class="mt-3"><?= "Rp " . number_format($md->harga, 2, ',', '.') ?></h5>
                            <p class="text-info">Kuota : <?= $md->stok ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= site_url('/daftar/' . $md->id_banner) ?>" class="btn btn-primary">Daftar</a>
                            <a href="<?= site_url('banner/view/' . $md->id_banner) ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- domestic end-->

<!-- ***** banner section 1 start ***** -->
<section class="section4" id="call-to-action2">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="cta-content">
                        <h2 class='pt-2'>Butuh<em> private tour?</em></h2>
                        <h3 class="mt-1">hubungi customer service kami dan dapatkan penawaran spesial!</h3>
                        <h3>whatsapp:<em> 0856-2451-9776</em>, atau <a href="https://api.whatsapp.com/send?phone=6285624519776" class="text-warning">klik disini</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** banner section 1 end ***** -->


<!-- About Us Start -->
<section id="about_us">
    <div class="container">
        <div class="row promo_text rounded mx-auto d-block">
            <div class="col-12 pb-3">
                <h3>About Us</h3>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12 pt-3 pb-3">
                <div class="col-10 text-justify rounded mx-auto d-block">
                    <p>Taiba Travel telah melayani masyarakat indonesia sejak tahun 2012. Awalnya travel kami
                        merupakan sebuah travel umroh dan haji saja. Namun sejak tahun 2017. Kami mulai membuka
                        program, tour turki, jordan dan palestina. Saat pandemi menerpa tahun 2020, kami pun
                        mulai
                        membuka tour domestic atau dalam negeri, seperti tour malang, bali, laboan bajo, jogja
                        dan
                        lain-lain. Selain tour yang kami sediakan kami juga menerima reservasi tour private
                        dengan
                        tempat tujuan yang diinginkan customer.
                    </p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <h4 class="text-info font-weight-bold">Contact Us</h4>
                <h5>whatsapp: 0856-2451-9776 atau <a href="https://api.whatsapp.com/send?phone=6285624519776" class="text-warning">klik disini</a></h5>
                <h5>facebook: Umroh Purwakarta atau <a href="https://m.facebook.com/profile.php?id=100025847806361" class="text-warning">klik disini</a></h5>
            </div>
        </div>
    </div>
</section>
<!-- about_us part end-->

<!--::footer_part start::-->
<footer class="footer_part">
    <div class="container">
        <div class="row">
            <div class="col-2  rounded mx-auto d-block">
                <a class="icon_bawah  rounded mx-auto d-block pt-3" href="index.php">
                    <img src="<?= base_url() ?>/img/taibatravel.png" alt="logo" width="150px">
                </a>
            </div>
        </div>
        <div class="row ">
            <div class="rounded mx-auto d-block py-3">
                <a href="https://www.instagram.com/taibatravelpurwakarta/"><img src="<?= base_url() ?>/img/icon/instagram.png" alt=""></a>
                <a href="https://m.facebook.com/profile.php?id=100025847806361"><img src="<?= base_url() ?>/img/icon/facebook.png" width="50px" alt=""></a>
                <a href="https://api.whatsapp.com/send?phone=6285624519776"><img src="<?= base_url() ?>/img/icon/whatsapp.png" alt=""></a>
            </div>
        </div>
        <div class="row rounded mx-auto d-block">
            <div class="col-12 ">
                <h6 class="text-center">Travel makes one modest. You see what a tiny place you occupy in the world.
                </h6>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->
<?= $this->endSection() ?>