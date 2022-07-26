<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\BannerModel;
use \App\Models\TransaksiModel;

class Etalase extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->banner = new BannerModel();
        $this->transaksi = new TransaksiModel();
    }

    public function index()
    {
        //
    }

    public function daftar()
    {
        $id = $this->request->uri->getSegment(3);

        $modelBanner = new \App\Models\BannerModel();

        $model = $modelBanner->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $transaksiModel = new \App\Models\TransaksiModel();
                $transaksi = new \App\Entities\Transaksi();

                $bannerModel = new \App\Models\BannerModel();
                $id_banners = $this->request->getPost('id_banner');
                $jumlah_pembelian = $this->request->getPost('jumlah');

                $banner = $bannerModel->find($id_banners);
                $entityBanner = new \App\Entities\Banner();
                //disini kurang di part 5
                $entityBanner->id_banner = $id_banners;

                $entityBanner->stok = $banner->stok - $jumlah_pembelian;
                $bannerModel->save($entityBanner);

                $transaksi->fill($data);
                $transaksi->status = 0;
                $transaksi->created_by = $this->session->get('id_user');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $transaksiModel->save($transaksi);

                $id = $transaksiModel->insertID();

                $segment = ['transaksi', 'view', $id];

                return redirect()->to(site_url($segment));
                //dd($transaksiModel->save($transaksi));
            }
        }
        return view('etalase/daftar', [
            'model' => $model,
        ]);
    }

    public function daftar_diskon()
    {
        $id = $this->request->uri->getSegment(3);

        $modelPromo = new \App\Models\PromoModel();

        $model = $modelPromo->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $transaksiModel = new \App\Models\TransaksiModel();
                $transaksi = new \App\Entities\Transaksi();

                $promomodel = new \App\Models\PromoModel();
                $id_promos = $this->request->getPost('id_promo');
                $jumlah_pembelian = $this->request->getPost('jumlah');

                $promo = $promomodel->find($id_promos);
                $entityPromo = new \App\Entities\Banner();
                //disini kurang di part 5
                $entityPromo->id_promo = $id_promos;

                $entityPromo->stok = $promo->stok - $jumlah_pembelian;
                $promomodel->save($entityPromo);

                $transaksi->fill($data);
                $transaksi->status = 0;
                $transaksi->created_by = $this->session->get('id_user');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $transaksiModel->save($transaksi);

                $id = $transaksiModel->insertID();

                $segment = ['transaksi', 'view', $id];

                return redirect()->to(site_url($segment));
            }
        }
        return view('etalase/daftar_diskon', [
            'model' => $model,
        ]);
    }
}
