<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row detail">
            <div class="card mx-auto">
                <div class="card-header">
                    <h4 class="d-inline">List Tour</h4>
                    <div class="card-header-action d-inline">
                        <a href="<?= site_url('banner/index') ?>" class="btn btn-primary mx-3"><i class="fa-solid fa-square-chevron-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-responsive">
                        <thead>
                            <th>No</th>
                            <th>banner</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Kuota</th>
                            <th>Lama Tour</th>
                            <!-- <th>Jenis Tour</th> -->
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($banners as $index => $banner) : ?>
                                <tr>
                                    <td><?= ($index + 1) ?></td>
                                    <td><?= $banner->nama ?></td>
                                    <td>
                                        <img class="img-fluid" width="200px" alt="gambar" src="<?= base_url('uploads/' . $banner->gambar) ?>" />
                                    </td>
                                    <td><?= $banner->harga ?></td>
                                    <td><?= $banner->stok ?></td>

                                    <td><?= $banner->lama_tour ?> hari</td>
                                    <td><?= $banner->deskripsi ?></td>
                                    <td class="">
                                        <a href="<?= site_url('banner/restore/' . $banner->id_banner) ?>" class="d-flex btn btn-success my-2 font_table">Restore</a>
                                        <a href="<?= site_url('banner/delete2/' . $banner->id_banner) ?>" class="d-flex btn btn-danger my-2 font_table">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>