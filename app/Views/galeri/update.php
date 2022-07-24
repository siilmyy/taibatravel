<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <?php

        // $id = [
        //     'id' => $thread->id
        // ];

        $nama = [
            'name' => 'nama',
            'id' => 'nama',
            'value' => $galeri->nama,
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
        <div class="card">
            <div class="card-header">
                <h1>Update Galeri</h1>
            </div>
            <div class="card-body">
                <?= form_open_multipart('galeri/update/' . $galeri->id) ?>

                <div class="form-group">
                    <?= form_label("Nama", "nama") ?>
                    <?= form_input($nama) ?>
                </div>

                <div class="form-group">
                    <?= form_label("Gambar", "gambar") ?> <br>
                    <img class="img-fluid" width="200px" alt="image" src="<?= base_url('uploads/' . $galeri->gambar) ?>" /> <br>
                    <div class="mt-3">
                        <?= form_upload($gambar) ?>
                    </div>
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