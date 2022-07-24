<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container-fluid single_padding_top padding_bottom">
        <div class="row justify-content-center">

            <div class="">
                <?php
                $nama = [
                    'name' => 'nama',
                    'id' => 'nama',
                    'value' => null,
                    'class' => 'form-control',

                ];

                $harga = [
                    'name' => 'harga',
                    'id' => 'harga',
                    'value' => null,
                    'class' => 'form-control',
                    'type' => 'number',
                    'min' => 0,
                ];

                $harga_dp = [
                    'name' => 'harga_dp',
                    'id' => 'harga_dp',
                    'value' => null,
                    'class' => 'form-control',
                    'type' => 'number',
                    'min' => 0,
                ];

                $stok = [
                    'name' => 'stok',
                    'id' => 'stok',
                    'value' => null,
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
                    'value' => null,
                    'class' => 'form-control',
                    'type' => 'number',
                    'min' => 0,
                ];

                $hotel = [
                    'name' => 'hotel',
                    'id' => 'hotel',
                    'value' => null,
                    'class' => 'form-control',
                ];

                $deskripsi = [
                    'name' => 'deskripsi',
                    'id' => 'deskripsi',
                    'value' => null,
                    'class' => 'form-control',
                ];

                $id_kategori = [
                    'name' => 'id_kategori',
                    'class' => 'form-control',
                    'options' => $arrayKategori,
                    'selected' => null,
                ];

                $submit = [
                    'name' => 'submit',
                    'id' => 'submit',
                    'value' => 'Submit',
                    'class' => 'btn btn-warning',
                    'type' => 'submit',
                ];
                ?>


                <?php if (session()->has('pesan')) { ?>
                    <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php } ?>
                <?php $validation = \Config\Services::validation(); ?>

                <div class="tabeltambah card my-5">
                    <dic class="card-header">
                        <h1>Tambah Banner</h1>
                    </dic>
                    <div class="card-body">
                        <?= form_open_multipart('Banner/create') ?>

                        <div class="form-group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("Nama", "nama") ?>
                            <?= form_input($nama) ?>
                        </div>

                        <div class="form-group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("Harga", "harga") ?>
                            <?= form_input($harga) ?>
                        </div>

                        <div class="form-group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("Harga DP Booking Slot", "harga_dp") ?>
                            <?= form_input($harga_dp) ?>
                        </div>

                        <div class="form-group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("Stok", "stok") ?>
                            <?= form_input($stok) ?>
                        </div>

                        <div class="form-group">
                            <?= form_label("Gambar", "gambar") ?>
                            <?= form_upload($gambar) ?>
                        </div>

                        <div class="form-group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("Lama Tour", "lama_tour") ?>
                            <?= form_input($lama_tour) ?>
                        </div>

                        <div class="form-group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("Penginapan", "hotel") ?>
                            <?= form_input($hotel) ?>
                        </div>

                        <div class="form-group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("deskripsi", "deskripsi") ?>
                            <?= form_textarea($deskripsi) ?>
                        </div>
                        <div class="form-group mb-5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
                            <?= form_label("Kategori", "id_kategori") ?>
                            <br>
                            <?= form_dropdown($id_kategori) ?>
                        </div>
                        <div class="text-right">
                            <?= form_submit($submit) ?>
                        </div>
                    </div>
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