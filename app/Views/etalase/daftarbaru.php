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
                                <label for="nama_pembeli">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" placeholder="Nama Lengkap Pemesan" required="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="nama" name="nama" placeholder="nama" readonly="true" value="<?= $banner['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Aktif</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                            <div class=" form-group">
                                <label for="jumlah">Jumlah Pembelian</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Enter jumlah" value="1" min="1" max="<?= $banner['stok']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="harga" name="harga" placeholder="Enter harga" value="<?= $banner['harga']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" class="form-control" id="total_harga" name="total_harga" readonly="true" placeholder="Enter Total Harga">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="harga_dp" name="harga_dp" placeholder="Enter Harga DP" readonly="true" value="<?= $banner['harga_dp']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="total_dp">Total DP</label>
                                <input type="text" class="form-control" readonly="true" id="total_dp" name="total_dp" placeholder="Enter Total DP" required="">
                            </div>
                            <div class="form-group">
                                <label for="handphone">Nomor Handphone</label>
                                <input type="number" class="form-control" id="handphone" name="handphone" placeholder="Enter handphone" required="">
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="alamat" required=""></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" id="btnSave" class="btn btn-success">Bayar sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-danger">Notice!</h3>
                        </div>
                        <div class="card-body">
                            <h5>1. Jika sudah selesai melakukan tahap pembayaran DP. Silahkan hubungi dan lampirkan bukti pembayaran pada customer services kami <a href="https://api.whatsapp.com/send?phone=6285624519776" class="text-info">disini</a> untuk kelanjutan pembayaran dan syarat-syarat keberangkatan sesuai paket yang dipilih</h5>
                            <h5>2. Apabila memilih perjalan internasional tetapi belum memiliki passport, harap segera hubungi customer services kami setelah pembayaran berhasil. Silahkan hubungi customer services kami <a href="https://api.whatsapp.com/send?phone=6285624519776" class="text-info">disini</a></h5>
                            <h5>2. Apabila memilih perjalanan Umroh dan belum memiliki Passport, berikut info yang harus disiapkan dan dilakukan, silahkan klik <a href="https://drive.google.com/file/d/1JIleRDbcasG3FQOvNA8gt0wBS0GAqwVr/view?usp=sharing" class="text-info">disini</a></h5>
                        </div>
                    </div>
                </div>
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
            var nama_pembeli = $('#nama_pembeli').val();
            var nama = $('#nama').val();
            var email = $('#email').val();
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
                    'nama_pembeli': nama_pembeli,
                    'nama': nama,
                    'email': email,
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
                                'nama_pembeli': nama_pembeli,
                                'nama': nama,
                                'email': email,
                                'jumlah': jumlah,
                                'total_harga': total_harga,
                                'total_dp': total_dp,
                                'handphone': handphone,
                                'alamat': alamat,
                            },
                            dataType: "json",
                            success: function(response) {
                                console.log(response);
                                // response = JSON.parse(response);
                                if (response.status == 'Success') {
                                    console.log('success');
                                    snap.pay(response.snapToken, {
                                        // Optional
                                        onSuccess: function(result) {
                                            let dataResult = JSON.stringify(result, null, 2);
                                            let dataObj = JSON.parse(dataResult);

                                            $.ajax({
                                                url: '<?= base_url() ?>/Transaksi/finishMidtrans/',
                                                type: 'POST',
                                                data: {
                                                    id_user: response.id_user,
                                                    id_banner: response.id_banner,
                                                    nama_pembeli: response.nama_pembeli,
                                                    nama: response.nama,
                                                    email: response.email,
                                                    jumlah: response.jumlah,
                                                    total_harga: response.total_harga,
                                                    total_dp: response.total_dp,
                                                    handphone: response.handphone,
                                                    alamat: response.alamat,
                                                    order_id: dataObj.order_id,
                                                    payment_type: dataObj.payment_type,
                                                    transaction_time: dataObj.transaction_time,
                                                    transaction_status: dataObj.transaction_status,
                                                    va_number: dataObj.bill_key,
                                                    bank: dataObj.biller_code,
                                                },
                                                dataType: "json",
                                                success: function(response) {
                                                    if (response.sukses) {
                                                        alert(response.sukses);
                                                        window.location.reload();
                                                    }
                                                },
                                                error: function(response) {
                                                    console.log(response.responseText)
                                                }
                                            });
                                        },
                                        // Optional
                                        onPending: function(result) {
                                            let dataResult = JSON.stringify(result, null, 2);
                                            let dataObj = JSON.parse(dataResult);
                                            console.log(dataObj);
                                            $.ajax({
                                                url: '<?= base_url() ?>/Transaksi/finishMidtrans/',
                                                type: 'POST',
                                                data: {
                                                    id_user: response.id_user,
                                                    id_banner: response.id_banner,
                                                    nama_pembeli: response.nama_pembeli,
                                                    nama: response.nama,
                                                    email: response.email,
                                                    jumlah: response.jumlah,
                                                    total_harga: response.total_harga,
                                                    total_dp: response.total_dp,
                                                    handphone: response.handphone,
                                                    alamat: response.alamat,
                                                    order_id: dataObj.order_id,
                                                    payment_type: dataObj.payment_type,
                                                    transaction_time: dataObj.transaction_time,
                                                    transaction_status: dataObj.transaction_status,
                                                    va_number: dataObj.bill_key,
                                                    bank: dataObj.biller_code,
                                                },
                                                dataType: "json",
                                                success: function(response) {
                                                    if (response.sukses) {
                                                        alert(response.sukses);
                                                        window.location.reload();
                                                    }
                                                }
                                            });
                                        },
                                        // Optional
                                        onError: function(result) {
                                            let dataResult = JSON.stringify(result, null, 2);
                                            let dataObj = JSON.parse(dataResult);

                                            $.ajax({
                                                url: '<?= base_url() ?>/Transaksi/finishMidtrans/',
                                                type: 'POST',
                                                data: {
                                                    id_user: response.id_user,
                                                    id_banner: response.id_banner,
                                                    nama_pembeli: response.nama_pembeli,
                                                    nama: response.nama,
                                                    email: response.email,
                                                    jumlah: response.jumlah,
                                                    total_harga: response.total_harga,
                                                    total_dp: response.total_dp,
                                                    handphone: response.handphone,
                                                    alamat: response.alamat,
                                                    order_id: dataObj.order_id,
                                                    payment_type: dataObj.payment_type,
                                                    transaction_time: dataObj.transaction_time,
                                                    transaction_status: dataObj.transaction_status,
                                                    va_number: dataObj.bill_key,
                                                    bank: dataObj.biller_code,
                                                },
                                                dataType: "json",
                                                success: function(response) {
                                                    if (response.sukses) {
                                                        alert(response.sukses);
                                                        window.location.reload();
                                                    }
                                                },
                                                error: function(response) {
                                                    console.log(response.responseText)
                                                }
                                            });
                                        }
                                    });
                                }
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