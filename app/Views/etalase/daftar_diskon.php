<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
<!-- hearder start -->
<?php
// var_dump($model);

?>
<section class="banner_part">
    <div class="container padding_top padding_bottom">
        <div class="container">
            <div class="row detail justify-content-center">
                <div class="col-sm-10 col-md-4 ">
                    <div class="card">
                        <div class="card-body text-center">
                            <img class="img pb-2" width="300px" src="<?= base_url('uploads/' . $promo['gambar']) ?>" />
                            <h3 class="font-weight-bold"><?= $promo['nama'] ?></h3>
                            <h5> Harga : <?= "Rp " . number_format($promo['harga'], 2, ',', '.') ?></h5>
                            <h5> Penginapan : <?= $promo['hotel'] ?></h5>
                            <h5 class="text-primary"> Kuota : <?= $promo['stok'] ?></h5>
                            <a href="<?= site_url('promo/view/' . $promo['id_promo']) ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-5 py-5 pt-md-0">
                    <form action="" method="post" enctype="multipart/form-data">
                        <? csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">

                                <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="Enter Title" value="<?= $iduser; ?>" disabled>
                            </div>
                            <div class="form-group">

                                <input type="hidden" class="form-control" id="id_promo" name="id_promo" placeholder="Enter id_promo" value="<?= $promo['id_promo']; ?>" disabled>
                            </div>
                            <div class=" form-group">
                                <label for="jumlah">Jumlah Pembelian</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Enter jumlah" onblur="someFunction()" value="1" min="1" max="<?= $promo['stok']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="harga_diskon" name="harga_diskon" placeholder="Enter harga" value="<?= $promo['harga_diskon']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" class="form-control" id="total_harga" name="total_harga" readonly="true" placeholder="Enter Total Harga" onblur="someFunction()">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="harga_dp" name="harga_dp" placeholder="Enter Harga DP" readonly="true" value="<?= $promo['harga_dp']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="total_dp">Total DP</label>
                                <input type="text" class="form-control" readonly="true" id="total_dp" name="total_dp" placeholder="Enter Total DP" onblur="someFunction()">
                            </div>
                            <div class="form-group">
                                <label for="handphone">Nomor Handphone</label>
                                <input type="text" class="form-control" id="handphone" name="handphone" placeholder="Enter handphone" onkeypress="return Angka(event)">
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="alamat" required></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer justify-content-end">
                            <button type="button" id="btnSave" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    // $('document').ready(function() {
    //     var jumlah_pembelian = 1;
    //     var harga = <?= $promo['harga'] ?>;
    //     var harga_dp = <?= $promo['harga_dp'] ?>

    //     jumlah_pembelian = $("#jumlah").val();
    //     var total_harga = (jumlah_pembelian * harga);
    //     $("#total_harga").val(total_harga);

    //     $("#jumlah").on("change", function() {
    //         jumlah_pembelian = $("#jumlah").val();
    //         var total_harga = (jumlah_pembelian * harga);
    //         $("#total_harga").val(total_harga);
    //     });

    //     jumlah_pembelian = $("#jumlah").val();
    //     var total_dp = (jumlah_pembelian * harga_dp);
    //     $("#total_dp").val(total_dp);

    //     $("#jumlah").on("change", function() {
    //         jumlah_pembelian = $("#jumlah").val();
    //         var total_dp = (jumlah_pembelian * harga_dp);
    //         $("#total_dp").val(total_dp);
    //     });
    // });
    function Angka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    $('document').ready(function() {
        var p1 = $('#jumlah').val();
        var p2 = $('#harga_diskon').val();
        var p0 = $('#harga_dp').val();
        if (p1 == '' || p2 == '') {
            alert('Please Fill all the Values');
        } else {
            var p3 = (p1 * p2);
            $('#total_harga').val(p3);

            var p4 = (p1 * p0);
            $('#total_dp').val(p4);
        }
    });

    $(document).ready(function() {

        $(document).delegate('#btnSave', 'click', function() {

            var id_user = $('#id_user').val();
            var id_promo = $('#id_promo').val();
            var jumlah = $('#jumlah').val();
            var stok = $('#stok').val();
            var total_harga = $('#total_harga').val();
            var total_dp = $('#total_dp').val();
            var handphone = $('#handphone').val();
            var alamat = $('#alamat').val();

            $.ajax({
                url: '<?= base_url() ?>/Transaksi/save_diskon/',
                type: 'POST',
                data: {
                    'id_user': id_user,
                    'id_promo': id_promo,
                    'jumlah': jumlah,
                    'total_harga': total_harga,
                    'total_dp': total_dp,
                    'handphone': handphone,
                    'alamat': alamat,
                },
                success: function(result) {
                    result = JSON.parse(result);
                    if (result.value) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Transaksi Berhasil",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: "Transaksi Gagal. " + result.message,
                            type: 'error',
                        }).then((result) => {

                        });
                    }
                },
                error: function(jqxhr, status, exception) {
                    Swal.fire({
                        title: 'Error',
                        text: "Transaksi Gagal",
                        type: 'error',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>