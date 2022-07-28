<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row detail">
            <div class="card mx-auto">
                <div class="card-header ">
                    <h4 class="d-inline">List Tour</h4>
                    <a href="<?= site_url('banner/trashed') ?>" class="btn btn-danger mx-3 justify-content-end"><i class="fa fa-trash"></i></a>
                </div>
                <div class="card-body pb-5">

                    <table class="table table-responsive " id="example">
                        <thead class="">
                            <th>No</th>
                            <th>banner</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Book Slot</th>
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
                                    <td><?= number_format($banner->harga, 2, ',', '.') ?></td>
                                    <td><?= number_format($banner->harga_dp, 2, ',', '.') ?></td>
                                    <td><?= $banner->stok ?></td>

                                    <td><?= $banner->lama_tour ?> hari</td>
                                    <td><?= $banner->deskripsi ?></td>
                                    <td class="">
                                        <a href="<?= site_url('banner/view/' . $banner->id_banner) ?>" class="d-flex btn btn-success my-2 font_table">View</a>
                                        <a href="<?= site_url('banner/update/' . $banner->id_banner) ?>" class="d-flex btn btn-primary my-2 font_table">Update</a>
                                        <a href="<?= site_url('banner/delete/' . $banner->id_banner) ?>" class="d-flex btn btn-warning my-2 font_table">Hide</a>
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