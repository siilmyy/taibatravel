<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- promo part start-->
<section class="banner_part">
    <div class="container single_padding_top">

        <div class="row justify-content-center mb-3">
            <h2 class="text-warning">detail program</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-4 ">
                <img class="img text-center" alt="image" width="400px" src="<?= base_url('uploads/' . $promo->gambar) ?>" />
            </div>
            <div class="col-sm col-md-5 pt-3 pt-md-0">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-primary"><?= $promo->nama ?></h3>
                        <h5>Harga Diskon : <?= "Rp " . number_format($promo->harga_diskon, 2, ',', '.') ?> /orang</h5>
                        <h5>Harga Booking : <?= "Rp " . number_format($promo->harga_dp, 2, ',', '.') ?> /orang</h5>
                        <h5>Kuota : <?= $promo->stok ?> orang</h5>
                        <h5>Lama tour : <?= $promo->lama_tour ?> hari</h5>
                        <h5>Penginapan : <?= $promo->hotel ?></h5>
                        <h5>Kategori : <?= $kategori->kategori ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row padding_bottom py-5 justify-content-center">
            <div class="card d-flex tabeltambah">
                <div class="card-header">
                    <h3 class="text-primary">Deskripsi Tour & Itenarary</h3>
                </div>
                <div class="card-body">
                    <h5><?= $promo->deskripsi ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>