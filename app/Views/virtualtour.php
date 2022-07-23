<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top">
        <div class="row rounded mx-auto d-block">
            <h4 class="text-light font-weight-bold text-center mb-4">Lihat penampakan alam dalam view 360 derajat dengan perangkat anda!!</h4>
            <div class="row">
                <div class="slide-photo row rounded mx-auto d-block">
                    <div id="demo" class="carousel slide" data-interval="false">
                        <div class="card px-3 bg-warning">
                            <div class="card-header">
                                <h3 class="text-primary font-weight-bold text-center">Domestik</h3>
                            </div>
                            <div class="carousel-inner px-2">
                                <div class="carousel-item active pb-3">
                                    <h3 class="text-light text-center py-2">Raja Ampat, Papua</h3>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/w7uaPX-YL0k?start=32" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="carousel-item pb-3">
                                    <h3 class="text-light text-center py-2">Laboan Bajo, NTT</h3>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Uf899-4oKTM?start=32" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="carousel-item pb-3">
                                    <h3 class="text-light text-center py-2">Bromo Malang, Jawa Timur</h3>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/BnyFVFAgdKc?start=32" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a class="carousel-control-prev " href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon text-primary"></span>
                            </a>
                            <a class="carousel-control-next px-4" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon text-primary"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row single_padding_top mb-5">
                <div class="slide-photo row rounded mx-auto d-block">
                    <div id="demo" class="carousel slide" data-interval="false">
                        <div class="card px-3 bg-warning">
                            <div class="card-header">
                                <h3 class="text-primary font-weight-bold text-center">Internasional</h3>
                            </div>
                            <div class="carousel-inner px-2">
                                <div class="carousel-item active pb-3">
                                    <h3 class="text-light text-center py-2">Masjidil Haram, Saudi Arabia</h3>
                                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/k_clFvRu0cs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="carousel-item pb-3">
                                    <h3 class="text-light text-center py-2">Masjid An-Nabawi, Saudi Arabia</h3>
                                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/m0NgcyGdzw4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="carousel-item pb-3">
                                    <h3 class="text-light text-center py-2">Istanbul, Turki</h3>
                                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/ufPfQCIdL4I?start=87" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a class="carousel-control-prev " href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon text-primary"></span>
                            </a>
                            <a class="carousel-control-next px-4" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon text-primary"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="card text-center mx-auto">
                    <div class="card-header">
                        <h3 class="text-info font-weight-bold">
                            Gallery Taiba Travel
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row padding_bottom">
                <?php foreach ($model as $m) : ?>
                    <div class="col-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <img class="img-thumbnail" style="max-height: 200px" src="<?= base_url('uploads/' . $m->gambar) ?>" />
                            </div>
                            <div class="card-footer">
                                <h5 class=""><?= $m->nama ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    </div>
</section>

<?= $this->endSection() ?>