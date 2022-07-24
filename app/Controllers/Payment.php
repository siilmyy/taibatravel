<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Payment extends BaseController
{
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

        // Populate items
        // $items = array(
        //     array(
        //         'id'       => 'item1',
        //         'price'    => 100000,
        //         'quantity' => 1,
        //         'name'     => 'Adidas f50'
        //     ),
        //     array(
        //         'id'       => 'item2',
        //         'price'    => 50000,
        //         'quantity' => 2,
        //         'name'     => 'Nike N90'
        //     )
        // );

        // // Populate customer's billing address
        // $billing_address = array(
        //     'first_name'   => "Andri",
        //     'last_name'    => "Setiawan",
        //     'address'      => "Karet Belakang 15A, Setiabudi.",
        //     'city'         => "Jakarta",
        //     'postal_code'  => "51161",
        //     'phone'        => "081322311801",
        //     'country_code' => 'IDN'
        // );

        // // Populate customer's shipping address
        // $shipping_address = array(
        //     'first_name'   => "John",
        //     'last_name'    => "Watson",
        //     'address'      => "Bakerstreet 221B.",
        //     'city'         => "Jakarta",
        //     'postal_code'  => "51162",
        //     'phone'        => "081322311801",
        //     'country_code' => 'IDN'
        // );

        // // Populate customer's info
        // $customer_details = array(
        //     'first_name'       => "Andri",
        //     'last_name'        => "Setiawan",
        //     'email'            => "test@test.com",
        //     'phone'            => "081322311801",
        //     'billing_address'  => $billing_address,
        //     'shipping_address' => $shipping_address
        // );

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 10000,
        //     ),
        //     'item_details'        => $items,
        //     'customer_details'    => $customer_details
        // );
        $id_user = $_POST['id_user'];
        $id_banner = $_POST['id_banner'];
        $total_harga = $_POST['total_harga'];
        $jumlah = $_POST['jumlah'];
        $total_dp = $_POST['total_dp'];
        $handphone = $_POST['handphone'];
        $alamat = $_POST['alamat'];


        // $modelTransaksi = new \App\Models\TransaksiModel();
        // $cekdata = $modelTransaksi->tampilDataTemp($id_banner);
        // dd($cekdata);


        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total_dp,
                // 'gross_amount' => 100,
            ),
            'customer_details' => array(
                'first_name' => $id_user,
                'email' => 'budi.pra@example.com',
                'phone' => $handphone,
                // 'phone' => '10927393',
            ),
            'item_details' => array(
                array(
                    'id'       => 'item1',
                    'price'    => $total_dp / $jumlah,
                    'quantity' => $jumlah,
                    'name'     => $id_banner
                ),
            )
        );

        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
            'status' => 'Success',
            'total' => $total_dp,
            // 'cekdata' => $cekdata
        ];
        return json_encode($data);
        // return view('etalase/daftarbaru', $data);
        // return view('payment/pay', $data);
    }
}
