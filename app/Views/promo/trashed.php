<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row detail">
            <div class="card mx-auto">
                <div class="card-header">
                    <h4 class="d-inline">List Tour</h4>
                    <div class="card-header-action d-inline">
                        <a href="<?= site_url('promo/index') ?>" class="btn btn-primary mx-3"><i class="fa-solid fa-square-chevron-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-responsive" id="example">
                        <thead>
                            <th>No</th>
                            <th>banner</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Harga DP</th>
                            <th>Harga Diskon</th>
                            <th>Kuota</th>
                            <th>Lama Tour</th>
                            <!-- <th>Jenis Tour</th> -->
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($promos as $index => $promo) : ?>
                                <tr>
                                    <td><?= ($index + 1) ?></td>
                                    <td><?= $promo->nama ?></td>
                                    <td>
                                        <img class="img-fluid" width="200px" alt="gambar" src="<?= base_url('uploads/' . $promo->gambar) ?>" />
                                    </td>
                                    <td><?= number_format($promo->harga, 2, ',', '.') ?></td>
                                    <td><?= number_format($promo->harga_dp, 2, ',', '.') ?></td>
                                    <td><?= number_format($promo->harga_diskon, 2, ',', '.') ?></td>
                                    <td><?= $promo->stok ?></td>

                                    <td><?= $promo->lama_tour ?> hari</td>
                                    <td><?= $promo->deskripsi ?></td>
                                    <td class="">
                                        <a href="<?= site_url('promo/restore/' . $promo->id_promo) ?>" class="d-flex btn btn-success my-2 font_table">Restore</a>
                                        <a href="<?= site_url('promo/delete2/' . $promo->id_promo) ?>" class="d-flex btn btn-danger my-2 font_table">Delete</a>
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
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endSection() ?>