<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="row detail justify-content-center">
            <div class="col-12">
                <div class="card mx-auto">
                    <div class="card-header ">
                        <h4 class="d-inline">Transaksi List</h4>
                    </div>
                    <div class="card-body pb-5">
                        <table class="table table-responsive" id="example">
                            <thead class="">
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Paket Travel</th>
                                <th>Jumlah Tiket</th>
                                <th>Total Harga</th>
                                <th>Total Bayar DP</th>
                                <th>Order ID</th>
                                <th>No. HP</th>
                                <th>Waktu Transaksi</th>
                                <th>Status</th>
                                <th>Payment Type</th>
                                <th>Invoice</th>
                                <!-- <th>Email</th>
                                <th>No Handphone</th> -->
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $index => $trans) : ?>
                                    <tr>
                                        <td><?= ($index + 1) ?></td>
                                        <td><?= $trans->nama_pembeli ?></td>
                                        <td><?= $trans->nama ?></td>
                                        <td><?= $trans->jumlah ?></td>
                                        <td>Rp.<?= number_format($trans->total_harga, 2, ',', '.') ?></td>
                                        <td>Rp.<?= number_format($trans->total_dp, 2, ',', '.') ?></td>
                                        <td><?= $trans->order_id ?></td>
                                        <td><?= $trans->handphone ?></td>
                                        <td><?= $trans->transaction_time ?></td>
                                        <td><?= $trans->transaction_status ?></td>
                                        <td><?= $trans->payment_type ?></td>
                                        <td><a href="<?= $trans->pdf_url ?>"></a><?= $trans->pdf_url ?></td>
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
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print'
            ]
        });
    });
</script>
<?= $this->endSection() ?>