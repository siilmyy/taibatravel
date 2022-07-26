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

                $gambar = [
                    'name' => 'gambar',
                    'id' => 'gambar',
                    'value' => null,
                    'class' => 'form-control',
                ];

                $submit = [
                    'name' => 'submit',
                    'id' => 'submit',
                    'value' => 'Submit',
                    'class' => 'btn btn-warning',
                    'type' => 'submit',
                ];
                ?>
                <div class="tabeltambah card mt-5">
                    <dic class="card-header">
                        <h1>Tambah Foto</h1>
                    </dic>
                    <div class="card-body">
                        <?= form_open_multipart('Galeri/create') ?>
                        <div class="form-group">
                            <?= form_label("Nama", "nama") ?>
                            <?= form_input($nama) ?>
                        </div>

                        <div class="form-group">
                            <?= form_label("Gambar", "gambar") ?>
                            <?= form_upload($gambar) ?>
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