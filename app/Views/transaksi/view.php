<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container single_padding_top">

        <h4>Transaksi No <?= $transaksi->id_transaksi ?></h4>
        <table class="table table-responsive">
            <tr>
                <td>Tour</td>
                <td><?= $transaksi->nama ?></td>
            </tr>
            <tr>
                <td>Pembeli</td>
                <td><?= $transaksi->username ?></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><?= $transaksi->jumlah ?></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><?= $transaksi->total_harga ?></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><?= $transaksi->total_dp ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?= $transaksi->alamat ?></td>
            </tr>
        </table>
    </div>
</section>

<?= $this->endSection('content'); ?>