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

        // $id = [
        //     'id' => $thread->id
        // ];

        $nama = [
            'name' => 'nama',
            'id' => 'nama',
            'value' => $banner->nama,
            'class' => 'form-control',
        ];

        $harga = [
            'name' => 'harga',
            'id' => 'harga',
            'value' => $banner->harga,
            'class' => 'form-control',
            'type' => 'number',
            'min' => 0,
        ];

        $harga_dp = [
            'name' => 'harga_dp',
            'id' => 'harga_dp',
            'value' => $banner->harga_dp,
            'class' => 'form-control',
            'type' => 'number',
            'min' => 0,
        ];

        $stok = [
            'name' => 'stok',
            'id' => 'stok',
            'value' => $banner->stok,
            'class' => 'form-control',
            'type' => 'number',
            'min' => 0,
        ];

        $gambar = [
            'name' => 'gambar',
            'id' => 'gambar',
            'value' => null,
            'class' => 'form-control',
        ];

        $lama_tour = [
            'name' => 'lama_tour',
            'id' => 'lama_tour',
            'value' => $banner->lama_tour,
            'class' => 'form-control',
            'type' => 'number',
            'min' => 0,
        ];

        $hotel = [
            'name' => 'hotel',
            'id' => 'hotel',
            'value' => $banner->hotel,
            'class' => 'form-control',
        ];

        $deskripsi = [
            'name' => 'deskripsi',
            'id' => 'deskripsi',
            'value' => $banner->deskripsi,
            'class' => 'form-control',
        ];

        $id_kategori = [
            'name' => 'id_kategori',
            'class' => 'form-control',
            'options' => $arrayKategori,
            'selected' => $banner->id_kategori,
        ];

        $submit = [
            'name' => 'submit',
            'id' => 'submit',
            'value' => 'Submit',
            'class' => 'btn btn-warning',
            'type' => 'submit',
        ];

        ?>

        <div class="card">
            <div class="card-header">
                <h1>Tambah banner</h1>
            </div>
            <div class="card-body">
                <?= form_open_multipart('banner/update/' . $banner->id_banner) ?>

                <div class="form-group">
                    <?= form_label("Nama", "nama") ?>
                    <?= form_input($nama) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Harga", "harga") ?>
                    <?= form_input($harga) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Harga DP Booking Slot", "harga_dp") ?>
                    <?= form_input($harga_dp) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Stok", "stok") ?>
                    <?= form_input($stok) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Lama Tour", "lama_tour") ?>
                    <?= form_input($lama_tour) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Penginapan", "hotel") ?>
                    <?= form_input($hotel) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Deskripsi", "deskripsi") ?>
                    <?= form_textarea($deskripsi) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Gambar", "gambar") ?> <br>
                    <img class="img-fluid" width="200px" alt="image" src="<?= base_url('uploads/' . $banner->gambar) ?>" /> <br>
                    <div class="mt-3">
                        <?= form_upload($gambar) ?>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <?= form_label("Kategori", "id_kategori") ?>
                    <br>
                    <?= form_dropdown($id_kategori) ?>
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