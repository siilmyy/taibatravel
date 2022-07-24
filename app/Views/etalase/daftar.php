<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
<!-- hearder start -->
<?php
$id_banner = [
    'name' => 'id_banner',
    'id' => 'id_banner',
    'value' => $model->id_banner,
    'type' => ''
];
// var_dump($model);
$id_user = [
    'name' => 'id_user',
    'id' => 'id_user',
    'value' => session()->get('id_user'),
    'type' => ''
];
$handphone = [
    'name' => 'handphone',
    'id' => 'handphone',
    'value' => null,
    'class' => 'form-control',
    'type' => 'number',
];
$jumlah = [
    'name' => 'jumlah',
    'id' => 'jumlah',
    'value' => 1,
    'min' => 1,
    'class' => 'form-control',
    'type' => 'number',
    'max' => '',
];
$total_harga = [
    'name' => 'total_harga',
    'id' => 'total_harga',
    'value' => null,
    'class' => 'form-control',
    'readonly' => true,
];
$total_dp = [
    'name' => 'total_dp',
    'id' => 'total_dp',
    'value' => null,
    'class' => 'form-control',
    'readonly' => true,
];
$alamat = [
    'name' => 'alamat',
    'id' => 'alamat',
    'class' => 'form-control',
    'value' => null,
];
$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'type' => 'submit',
    'value' => 'submit',
    'class' => 'btn btn-warning',
];
?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="container">
            <div class="row detail justify-content-center">
                <div class="col-sm-10 col-md-4 ">
                    <div class="card">
                        <div class="card-body text-center">
                            <img class="img pb-2" width="300px" src="<?= base_url('uploads/' . $model->gambar) ?>" />
                            <h3 class="font-weight-bold"><?= $model->nama ?></h3>
                            <h5> Harga : <?= "Rp " . number_format($model->harga, 2, ',', '.') ?></h5>
                            <h5> Penginapan : <?= $model->hotel ?></h5>
                            <h5 class="text-primary"> Kuota : <?= $model->stok ?></h5>
                            <a href="<?= site_url('banner/view/' . $model->id_banner) ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-5 py-5 pt-md-0">
                    <?= form_open('Etalase/daftar') ?>
                    <div class="form-group">
                        <?= form_label('Id User', 'id_user') ?>
                        <?= form_input($id_user) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Id Banner', 'id_banner') ?>
                        <?= form_input($id_banner) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Jumlah Pembelian', 'jumlah') ?>
                        <?= form_input($jumlah) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Total Harga', 'total_harga') ?>
                        <?= form_input($total_harga) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Total Harga DP Book Slot', 'total_dp') ?>
                        <?= form_input($total_dp) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Nomor Handphone Aktif', 'handphone') ?>
                        <?= form_input($handphone) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Alamat (Mohon Diisi)', 'alamat') ?>
                        <?= form_textarea($alamat) ?>
                    </div>
                    <div class="text-right">
                        <?= form_submit($submit) ?>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $('document').ready(function() {
        var jumlah_pembelian = 1;
        var harga = <?= $model->harga ?>;
        var harga_dp = <?= $model->harga_dp ?>

        jumlah_pembelian = $("#jumlah").val();
        var total_harga = (jumlah_pembelian * harga);
        $("#total_harga").val(total_harga);

        $("#jumlah").on("change", function() {
            jumlah_pembelian = Number($("#jumlah").val());
            var total_harga = (jumlah_pembelian * harga);
            $("#total_harga").val(total_harga);
        });

        jumlah_pembelian = $("#jumlah").val();
        var total_dp = (jumlah_pembelian * harga_dp);
        $("#total_dp").val(total_dp);

        $("#jumlah").on("change", function() {
            jumlah_pembelian = Number($("#jumlah").val());
            var total_dp = (jumlah_pembelian * harga_dp);
            $("#total_dp").val(total_dp);
        });
    });
</script>
<?= $this->endSection() ?>