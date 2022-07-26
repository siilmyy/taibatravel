<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <?php if (session()->has('pesan')) { ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php } ?>
        <?php $validation = \Config\Services::validation(); ?>

        <?php
        $id_banner = [
            'name' => 'id_banner',
            'id' => 'id_banner',
            'value' => $transaksi->id_banner,
            'type' => 'hidden'
        ];
        // var_dump($model);
        $id_user = [
            'name' => 'id_user',
            'id' => 'id_user',
            'value' => $transaksi->id_user,
            'type' => 'hidden'
        ];
        $handphone = [
            'name' => 'handphone',
            'id' => 'handphone',
            'value' => $transaksi->handphone,
            'class' => 'form-control',
            'type' => 'number',
        ];
        $jumlah = [
            'name' => 'jumlah',
            'id' => 'jumlah',
            'value' => $transaksi->jumlah,
            'min' => 1,
            'class' => 'form-control',
            'type' => 'number',
            'max' => '',
        ];
        $total_harga = [
            'name' => 'total_harga',
            'id' => 'total_harga',
            'value' => $transaksi->total_harga,
            'class' => 'form-control',
            'readonly' => true,
        ];
        $total_dp = [
            'name' => 'total_dp',
            'id' => 'total_dp',
            'value' => $transaksi->total_dp,
            'class' => 'form-control',
            'readonly' => true,
        ];
        $alamat = [
            'name' => 'alamat',
            'id' => 'alamat',
            'class' => 'form-control',
            'value' => $transaksi->alamat,
        ];
        $submit = [
            'name' => 'submit',
            'id' => 'submit',
            'type' => 'submit',
            'value' => 'submit',
            'class' => 'btn btn-warning',
        ];

        ?>

        <div class="card">
            <div class="card-header">
                <h1>Tambah banner</h1>
            </div>
            <div class="card-body">
                <?= form_open('transaksi/update/' . $transaksi->id_transaksi) ?>
                <div class="form-group">
                    <?= form_input($jumlah) ?>
                </div>
                <div class="form-group">
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
<script src="<?= base_url('ckeditor5/ckeditor.js') ?>"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            ckfinder: {
                uploadUrl: "<?= base_url('banner/uploadImages') ?>",
            },
        }).then(editor => {
            console.log(editor);
        }).catch(error => {
            console.log(error);
        });
</script>
<?= $this->endSection() ?>