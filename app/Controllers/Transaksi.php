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
        // $this->transaksimidtrans = new \App\Models\TransaksiMidtransModel();
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
                'nama_pembeli' => $this->request->getPost('nama_pembeli'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
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
                // $bannerModel = new banner();
                // $banner = $bannerModel->find($id_banner);
                // $entityBanner = new \App\Entities\Banner();
                // $entityBanner->id_banner = $id_banner;

                // $entityBanner->stok = $banner->stok - $jumlah;
                // $bannerModel->save($entityBanner);
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



    public function save_diskon()
    {
        try {
            $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $res = $this->transaksi->save([
                'id_user' => $this->request->getPost('id_user'),
                'id_banner' => $this->request->getPost('id_banner'),
                'jumlah' => $this->request->getPost('jumlah'),
                'nama_pembeli' => $this->request->getPost('nama_pembeli'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
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
                $b->id_transaksi = $id;
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

    public function finishMidtrans()
    {
        try {
            $time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $res = $this->transaksi->save([
                'id_user' => $this->request->getPost('id_user'),
                'id_banner' => $this->request->getPost('id_banner'),
                'jumlah' => $this->request->getPost('jumlah'),
                'email' => $this->request->getPost('email'),
                'nama_pembeli' => $this->request->getPost('nama_pembeli'),
                'nama' => $this->request->getPost('nama'),
                'total_harga' => $this->request->getPost('total_harga'),
                'total_dp' => $this->request->getPost('total_dp'),
                'handphone' => $this->request->getPost('handphone'),
                'alamat' => $this->request->getPost('alamat'),
                'created_at' => $time->format("Y-m-d H:i:s"),
                'updated_at' => $time->format("Y-m-d H:i:s"),
                'order_id' => $this->request->getPost('order_id'),
                'payment_type' => $this->request->getPost('payment_type'),
                'transaction_status' => $this->request->getPost('transaction_status'),
                'treansaction_time' => $this->request->getPost('transaction_time'),
                'va_number' => $this->request->getPost('va_number'),
                'bank' => $this->request->getPost('bank'),

            ]);
            if ($res == false) {
                $json = [
                    "value" => false,
                    "message" => 'data tidak lengkap'
                ];
            } else {
                $json = [
                    "value" => true,
                    "sukses" => 'Transaksi Midtrans berhasil disimpan, silahkan lanjutkan Pembayaran'
                ];
            }
            return json_encode($json);
        } catch (\Exception $e) {
            $json = [
                "value" => false,
                "message" => $e->getMessage()
            ];
            // return json_encode($data);
        }
    }
}
