<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container single_padding_top padding_bottom">
        <div class="row justify-content-center">
            <h2 class="text-warning">Galeri</h2>
        </div>
        <div class="viewgaleri">
            <div class="card mx-auto">
                <div class="card-header">
                    <h3 class="text-primary"><?= $galeri->nama ?></h3>
                </div>
                <div class="card-body">
                    <img class="img text-center" alt="image" width="400px" src="<?= base_url('uploads/' . $galeri->gambar) ?>" />
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>