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
                            <img class="img pb-2" width="300px" src="<?= base_url('uploads/' . $banner['gambar']) ?>" />
                            <h3 class="font-weight-bold"><?= $banner['nama'] ?></h3>
                            <h5> Harga : <?= "Rp " . number_format($banner['harga'], 2, ',', '.') ?></h5>
                            <h5> Penginapan : <?= $banner['hotel'] ?></h5>
                            <h5 class="text-primary"> Kuota : <?= $banner['stok'] ?></h5>
                            <a href="<?= site_url('banner/view/' . $banner['id_banner']) ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm col-md-5 py-5 pt-md-0">
                    <h5 class="text-light">Silahkan klik daftar, lalu klik pay untuk pembayaran</h5>
                    <form action="/daftar/save" method="post" enctype="multipart/form-data">
                        <? csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <!-- <label for="id_user">ID User</label> -->
                                <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="Enter Title" value="<?= $iduser; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <!-- <label for="id_banner">ID Banner</label> -->
                                <input type="hidden" class="form-control" id="id_banner" name="id_banner" placeholder="Enter id_banner" value="<?= $banner['id_banner']; ?>" disabled>
                            </div>

                            <div class=" form-group">
                                <label for="jumlah">Jumlah Pembelian</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Enter jumlah" onblur="someFunction()" value="1" min="1" max="<?= $banner['stok']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="harga" name="harga" placeholder="Enter harga" value="<?= $banner['harga']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" class="form-control" id="total_harga" name="total_harga" readonly="true" placeholder="Enter Total Harga" onblur="someFunction()">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="harga_dp" name="harga_dp" placeholder="Enter Harga DP" readonly="true" value="<?= $banner['harga_dp']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="total_dp">Total DP</label>
                                <input type="text" class="form-control" readonly="true" id="total_dp" name="total_dp" placeholder="Enter Total DP" onblur="someFunction()">
                            </div>
                            <div class="form-group">
                                <label for="handphone">Nomor Handphone</label>
                                <input type="number" class="form-control" id="handphone" name="handphone" placeholder="Enter handphone">
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="alamat" required></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" id="btnSave" class="btn btn-primary">Daftar</button>
                            <button type="button" id="tombolPay" class="btn btn-warning justify-content-end mx-4">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row tampilDataTemp">

            </div>
        </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-kP6BKT_pxz3F3JDn"></script>
<script>
    // function Angka(event) {
    //     var angka = (event.which) ? event.which : event.keyCode
    //     if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
    //         return false;
    //     return true;
    // }

    $('document').ready(function() {
        var p1 = $('#jumlah').val();
        var p2 = $('#harga').val();
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

    $("#jumlah").on("change", function() {
        var harga_dp = Number($('#harga_dp').val());
        jumlah_pembelian = Number($("#jumlah").val());
        var total_dp = (jumlah_pembelian * harga_dp);
        $("#total_dp").val(total_dp);
    });
    $("#jumlah").on("change", function() {
        var harga = Number($('#harga').val());
        jumlah_pembelian = Number($("#jumlah").val());
        var total_harga = (jumlah_pembelian * harga);
        $("#total_harga").val(total_harga);
    });

    $(document).ready(function() {

        $(document).delegate('#btnSave', 'click', function() {

            var id_user = $('#id_user').val();
            var id_banner = $('#id_banner').val();
            var jumlah = $('#jumlah').val();
            var stok = $('#stok').val();
            var total_harga = $('#total_harga').val();
            var total_dp = $('#total_dp').val();
            var handphone = $('#handphone').val();
            var alamat = $('#alamat').val();

            $.ajax({
                url: '<?= base_url() ?>/Transaksi/save/',
                type: 'POST',
                data: {
                    'id_user': id_user,
                    'id_banner': id_banner,
                    'jumlah': jumlah,
                    'total_harga': total_harga,
                    'total_dp': total_dp,
                    'handphone': handphone,
                    'alamat': alamat,
                },
                success: function(result) {
                    result = JSON.parse(result);
                    // console.log(result);
                    // return;
                    if (result.value) {
                        $.ajax({
                            url: '<?= base_url() ?>/Payment',
                            type: 'POST',
                            data: {
                                'id_user': id_user,
                                'id_banner': id_banner,
                                'jumlah': jumlah,
                                'total_harga': total_harga,
                                'total_dp': total_dp,
                                'handphone': handphone,
                                'alamat': alamat,
                            },
                            // dataType: "json",
                            success: function(response) {
                                response = JSON.parse(response);
                                console.log('pop up payment');
                                if (response.status == 'Success') {
                                    console.log('success');
                                    snap.pay(response.snapToken, {
                                        // Optional
                                        onSuccess: function(result) {
                                            /* You may add your own js here, this is just example */
                                            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                            console.log(JSON.stringify(result, null, 2));
                                        },
                                        // Optional
                                        onPending: function(result) {
                                            /* You may add your own js here, this is just example */
                                            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                            console.log(JSON.stringify(result, null, 2));
                                        },
                                        // Optional
                                        onError: function(result) {
                                            /* You may add your own js here, this is just example */
                                            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                            console.log(JSON.stringify(result, null, 2));
                                        }
                                    });
                                }
                            }
                        })
                    }
                    // Swal.fire({
                    //     title: 'Sukses',
                    //     text: "Transaksi Berhasil",
                    //     type: 'success',
                    // }).then((result) => {
                    //     if (result.value) {
                    //         location.reload();
                    //     }
                    // });
                    else {
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
        $('#tombolPay').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>/Transaksi/payMidtrans/',
                type: 'POST',
                data: {
                    'id_user': id_user,
                    'id_banner': id_banner,
                    'jumlah': jumlah,
                    'total_harga': total_harga,
                    'total_dp': total_dp,
                    'handphone': handphone,
                    'alamat': alamat,
                },
                dataType: "json",
                success: function(response) {
                    if (response.error) {
                        Swal.fire('Error', response.error, 'error');
                    } else {

                    }
                }
            })
        });
    });

    // function tampilDataTemp() {
    //     let id_banner = $('#id_banner').val();
    //     $.ajax({
    //         url: '<?= base_url() ?>/Transaksi/tampilDataTemp',
    //         type: 'POST',
    //         data: {
    //             id_banner: id_banner
    //         },
    //         dataType: 'dataType',
    //         beforeSend: function() {
    //             $('.tampilDataTemp').html("<i class='fa fa-spin fa-spinner'></i>");
    //         },
    //         success: function(resnponse) {
    //             $('.tampilDataTemp').html(response.data);
    //         },
    //         error: function(jqxhr, status, exception) {
    //             Swal.fire({
    //                 title: 'Error',
    //                 text: "Transaksi Gagal",
    //                 type: 'error',
    //             }).then((result) => {
    //                 if (result.value) {
    //                     location.reload();
    //                 }
    //             });
    //         }
    //     });
    // }
</script>
<?= $this->endSection() ?>