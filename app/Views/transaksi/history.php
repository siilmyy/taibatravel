<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row detail">
            <div class="col-12">
                <div class="card mx-auto">
                    <div class="card-header ">
                        <h4 class="d-inline">Transaksi List</h4>
                    </div>
                    <div class="card-body pb-5">

                        <table class="table table-responsive ">
                            <thead class="">
                                <th>No</th>
                                <th>Username</th>
                                <th>Paket Travel</th>
                                <th>Jumlah Tiket</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Ordel ID</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $index => $trans) : ?>
                                    <tr>
                                        <td><?= ($index + 1) ?></td>
                                        <td><?= $trans->nama_pembeli ?></td>
                                        <td><?= $trans->nama ?></td>
                                        <td><?= $trans->jumlah ?></td>
                                        <td><?= number_format($trans->total_harga, 2, ',', '.') ?></td>
                                        <td><?= $trans->status ?></td>
                                        <td><?= $trans->order_id ?> hari</td>
                                        <td class="">
                                            <a href="<?= site_url('transaksi/update/' . $trans->id_transaksi) ?>" class="d-flex btn btn-primary my-2 font_table">Edit</a>
                                            <a href="<?= site_url('transaksi/delete/' . $trans->id_transaksi) ?>" class="d-flex btn btn-warning my-2 font_table">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>