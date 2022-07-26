<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use DateTime;
use DateTimeZone;

class Payment extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->email = \Config\Services::email();

        // $this->transaksimidtrans = new \App\Models\TransaksiMidtransModel();
        $this->transaksi = new \App\Models\TransaksiModel();
        $this->transaksipromo = new \App\Models\TransaksiPromoModel();
        $this->banner = new \App\Models\BannerModel();
        $this->user = new \App\Models\UserModel();
    }

    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-XPVlhdgn-tQoGUS0jp849vuB';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $id_user = $_POST['id_user'];
        $id_banner = $_POST['id_banner'];
        $nama_pembeli = $_POST['nama_pembeli'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $total_harga = $_POST['total_harga'];
        $jumlah = $_POST['jumlah'];
        $total_dp = $_POST['total_dp'];
        $handphone = $_POST['handphone'];
        $alamat = $_POST['alamat'];

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total_dp,
                // 'gross_amount' => 100,
            ),
            'customer_details' => array(
                'first_name' => $nama_pembeli,
                'email' => $email,
                'phone' => $handphone,
                'address' => $alamat,
            ),
            'item_details' => array(
                array(
                    'id'       => 'Paket Travel',
                    'price'    => $total_dp / $jumlah,
                    'quantity' => $jumlah,
                    'name'     => $nama
                ),
            )
        );

        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
            'status' => 'Success',
            'total' => $total_dp,
            'nama' => $nama,
            'nama_pembeli' => $nama_pembeli,
            'jumlah' => $jumlah,
            'handphone' => $handphone,
            'email' => $email,
            'total_harga' => $total_harga,
            'id_banner' => $id_banner,
            'id_user' => $id_user,
            'alamat' => $alamat,
            // 'cekdata' => $cekdata
        ];
        return json_encode($data);
        // return view('etalase/daftarbaru', $data);
        // return view('payment/pay', $data);
    }


    // public function finishMidtrans()
    // {
    //     try {
    //         $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    //         $res = $this->transaksi->save([
    //             'id_user' => $this->request->getPost('id_user'),
    //             'id_banner' => $this->request->getPost('id_banner'),
    //             'jumlah' => $this->request->getPost('jumlah'),
    //             'email' => $this->request->getPost('email'),
    //             'nama_pembeli' => $this->request->getPost('nama_pembeli'),
    //             'nama' => $this->request->getPost('nama'),
    //             'total_harga' => $this->request->getPost('total_harga'),
    //             'total_dp' => $this->request->getPost('total_dp'),
    //             'handphone' => $this->request->getPost('handphone'),
    //             'alamat' => $this->request->getPost('alamat'),
    //             'created_at' => $time->format("Y-m-d H:i:s"),
    //             'updated_at' => $time->format("Y-m-d H:i:s"),
    //             'order_id' => $this->request->getPost('order_id'),
    //             'payment_type' => $this->request->getPost('payment_type'),
    //             'transaction_status' => $this->request->getPost('transaction_status'),
    //             'treansaction_time' => $this->request->getPost('transaction_time'),
    //             'va_number' => $this->request->getPost('va_number'),
    //             'bank' => $this->request->getPost('bank'),

    //         ]);
    //         if ($res == false) {
    //             $json = [
    //                 "value" => false,
    //                 "message" => 'data tidak lengkap'
    //             ];
    //         } else {
    //             $json = [
    //                 "value" => true,
    //                 "sukses" => 'Transaksi Midtrans berhasil disimpan, silahkan lanjutkan Pembayaran'
    //             ];
    //         }
    //         return json_encode($json);
    //     } catch (\Exception $e) {
    //         $json = [
    //             "value" => false,
    //             "message" => $e->getMessage()
    //         ];
    //         // return json_encode($data);
    //     }
    // }
    // public function finishMidtrans()
    // {
    //     $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    //     if ($this->reuest->isAJAX()) {
    //         // $id_user = $this->$this->request->getPost('id_user');
    //         // $id_banner = $this->request->getPost('id_banner');
    //         // $nama_pembeli = $this->request->getPost('nama_pembeli');
    //         // $nama = $this->request->getPost('nama');
    //         // $jumlah = $this->request->getPost('jumlah');
    //         // $email = $this->request->getPost('email');
    //         // $handphone = $this->request->getPost('handphone');
    //         // $alamat = $this->request->getPost('alamat');
    //         // $total_harga = $this->request->getPost('total_harga');
    //         // $total_dp = $this->request->getPost('total_dp');
    //         // $created_at = $time->format("Y-m-d H:i:s");
    //         // $updated_at = $time->format("Y-m-d H:i:s");
    //         $order_id = $this->$this->request->getPost('order_id');
    //         $payment_type = $this->$this->request->getPost('payment_type');
    //         $transaction_time = $this->request->getPost('transaction_time');
    //         $transaction_status = $this->request->getPost('transaction_status');
    //         $va_number = $this->request->getPost('va_number');
    //         $bank = $this->request->getPost('bank');

    //         $modelTransaksi = new \App\Models\TransaksiModel();
    //         $modelTransaksi->insert([
    //             // 'id_user' => $id_user,
    //             // 'id_banner' => $id_banner,
    //             // 'nama_pembeli' => $nama_pembeli,
    //             // 'nama' => $nama,
    //             // 'email' => $email,
    //             // 'jumlah' => $jumlah,
    //             // 'total_harga' => $total_harga,
    //             // 'total_dp' => $total_dp,
    //             // 'handphone' => $handphone,
    //             // 'alamat' => $alamat,
    //             'order_id' => $order_id,
    //             'payment_type' => $payment_type,
    //             'transaction_time' => $transaction_time,
    //             'transaction_status' => $transaction_status,
    //             'va_number' => $va_number,
    //             'va_number' => $va_number,
    //             'bank' => $bank,
    //         ]);

    //         $json = [
    //             'sukses' => 'Transaksi Midtrans berhasil tersimpan, silankan lanjutkan pembayaran'
    //         ];
    //         echo json_encode($json);
    //     }
    // }
}
