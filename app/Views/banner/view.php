<?= $this->extend('auth/templates/index'); ?>
<!--::header part start::-->
<?= $this->section('content'); ?>

<!-- banner part start-->
<section class="banner_part">
    <div class="container">

        <div class="row justify-content-center pt-5">
            <h1>view banner</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-6 px-0">
                <img class="img" alt="image" width="400px" src="<?= base_url('uploads/' . $banner->gambar) ?>" />
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text"><?= $banner->nama ?></h1>
                        <h4>Harga : <?= $banner->harga ?></h4>
                        <h4>Stok : <?= $banner->stok ?></h4>
                        <h4>Lama tour : <?= $banner->lama_tour ?></h4>
                        <h4>Deskripsi : <?= $banner->deskripsi ?></h4>
                        <h4>Kategori : <?= $kategori->kategori ?></h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>