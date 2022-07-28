<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row">
            <div class="card mx-auto">
                <div class="card-header">
                    <h4>List Galeri</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive" id="example">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($galeries as $index => $galeri) : ?>
                                <tr>
                                    <td><?= ($index + 1) ?></td>
                                    <td><?= $galeri->nama ?></td>
                                    <td>
                                        <img class="img-fluid" width="200px" alt="gambar" src="<?= base_url('uploads/' . $galeri->gambar) ?>" />
                                    </td>
                                    <td class="">
                                        <a href="<?= site_url('galeri/view/' . $galeri->id) ?>" class="d-flex btn btn-warning my-2 font_table">View</a>
                                        <a href="<?= site_url('galeri/update/' . $galeri->id) ?>" class="d-flex btn btn-primary my-2 font_table">Update</a>
                                        <a href="<?= site_url('galeri/delete/' . $galeri->id) ?>" class="d-flex btn btn-danger my-2 font_table">Delete</a>
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