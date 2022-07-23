<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container single_padding_top">

        <div class="row justify-content-center mb-3 detail">
            <h2 class="text-warning">detail program</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-4 ">
                <img class="img gambar text-center" alt="image" width="400px" src="<?= base_url('uploads/' . $banner->gambar) ?>" />
            </div>
            <div class="col-sm col-md-5 pt-3 pt-md-0">
                <div class="card ">
                    <div class="card-body">
                        <h3 class="text-primary"><?= $banner->nama ?></h3>
                        <h5>Harga : <?= "Rp " . number_format($banner->harga, 2, ',', '.') ?> /orang</h5>
                        <h5>Book Slot : <?= "Rp " . number_format($banner->harga_dp, 2, ',', '.') ?> /orang</h5>
                        <h5>Kuota : <?= $banner->stok ?> orang</h5>
                        <h5>Lama tour : <?= $banner->lama_tour ?> hari</h5>
                        <h5>Penginapan : <?= $banner->hotel ?></h5>
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
                    <h5><?= $banner->deskripsi ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>