<?php

namespace App\Controllers;

use DateTime;
use DateTimeZone;

class Transaksi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->email = \Config\Services::email();

        $this->transaksi = new \App\Models\TransaksiModel();
        $this->transaksipromo = new \App\Models\TransaksiPromoModel();
        $this->banner = new \App\Models\BannerModel();
        $this->user = new \App\Models\UserModel();
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksi = $transaksiModel->select('*, transaksi.id_transaksi AS id_transaksi')->join('banner', 'banner.id_banner=transaksi.id_transaksi')
            ->join('userbaru', 'userbaru.id_user=transaksi.id_pembeli')
            ->where('transaksi.id_transaksi', $id)
            ->first();


        return view('transaksi/view', [
            'transaksi' => $transaksi,
        ]);
    }

    public function save()
    {
        try {
            $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $res = $this->transaksi->save([
                'id_user' => $this->request->getPost('id_user'),
                'id_banner' => $this->request->getPost('id_banner'),
                'jumlah' => $this->request->getPost('jumlah'),
                'total_harga' => $this->request->getPost('total_harga'),
                'total_dp' => $this->request->getPost('total_dp'),
                'handphone' => $this->request->getPost('handphone'),
                'alamat' => $this->request->getPost('alamat'),
                'created_at' => $time->format("Y-m-d H:i:s"),
                'updated_at' => $time->format("Y-m-d H:i:s"),

            ]);
            if ($res == false) {
                $data = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            } else {
                $data = [
                    "value" => true
                ];
            }
            return json_encode($data);
        } catch (\Exception $e) {
            $data = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            // return json_encode($data);
        }
    }

    // public function tampilDataTemp()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_banner = $this->request->getPost('id_banner');

    //         $modeltransaksi = new transaksi();
    //         $dataTemp = $modeltransaksi->tampilDataTemp($id_banner);
    //         $data = [
    //             'tampildata' => view('etalase/datatemp', $dataTemp)
    //         ];
    //     }
    // }



    public function payMidtrans()
    {
        try {
            // $res = $this->transaksi->save([
            //     'id_user' => $this->request->getPost('id_user'),
            //     'id_banner' => $this->request->getPost('id_banner'),
            //     'jumlah' => $this->request->getPost('jumlah'),
            //     'total_harga' => $this->request->getPost('total_harga'),
            //     'total_dp' => $this->request->getPost('total_dp'),
            //     'handphone' => $this->request->getPost('handphone'),
            //     'alamat' => $this->request->getPost('alamat'),
            //     // 'created_date' => $this->request->date("Y-m-d H:i:s"),
            // ]);
            // if ($res == false) {
            //     $data = [
            //         "value" => false,
            //         "message" => 'data tidak lengkap'
            //     ];
            // } else {
            //     $data = [
            //         "value" => true
            //     ];
            // }

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => 10000,
                ),
                'customer_details' => array(
                    'first_name' => 'budi',
                    'last_name' => 'pratama',
                    'email' => 'budi.pra@example.com',
                    'phone' => '08111222333',
                ),
            );

            $data = [
                'snapToken' => \Midtrans\Snap::getSnapToken($params),
                'status' => 'Success'
            ];
            return json_encode($data);
        } catch (\Exception $e) {
            $data = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            return json_encode($data);
        }
    }

    public function save_diskon()
    {
        try {
            $res = $this->transaksi->save([
                'id_user' => $this->request->getPost('id_user'),
                'id_promo' => $this->request->getPost('id_promo'),
                'jumlah' => $this->request->getPost('jumlah'),
                'total_harga' => $this->request->getPost('total_harga'),
                'total_dp' => $this->request->getPost('total_dp'),
                'handphone' => $this->request->getPost('handphone'),
                'alamat' => $this->request->getPost('alamat'),
                // 'created_date' => $this->request->date("Y-m-d H:i:s"),
            ]);
            if ($res == false) {
                $data = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            } else {
                $data = [
                    "value" => true
                ];
            }
            return json_encode($data);
        } catch (\Exception $e) {
            $data = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            return json_encode($data);
        }

        //return redirect()->to('/daftar_posluhdes?kode_kec=' . $this->request->getPost('kode_kec'));
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);
        $modeltransaksi = new \App\Models\TransaksiModel();
        $transaksi = $modeltransaksi->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksiupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\transaksi();
                $b->id = $id;
                $b->fill($data);

                $modeltransaksi->save($b);

                $segments = ['transaksi', 'history', $id];


                return redirect()->to(base_url($segments));
            }
        }

        return view('transaksi/update', [
            'transaksi' => $transaksi,
        ]);
    }
}
