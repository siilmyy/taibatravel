<?php

namespace App\Controllers;

use \App\Models\BannerModel;
use \App\Models\TransaksiModel;


class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->banner = new BannerModel();
        $this->transaksi = new TransaksiModel();
    }

    // public function private()
    // {
    //     return view('privatetour');
    // }

    public function index()
    {
        $banner = new \App\Models\BannerModel();
        $promo = new \App\Models\PromoModel();

        $modelinter = $banner->where('id_kategori =', 1)->findAll();
        $modeldomestik = $banner->where('id_kategori =', 2)->findAll();
        $modelpromo = $promo->findAll();

        return view('index', [
            'modelinter' => $modelinter,
            'modeldomestik' => $modeldomestik,
            'modelpromo' => $modelpromo,
        ]);
    }
    public function user()
    {
        return view('user/index');
    }

    public function daftar($id_banner)
    {
        $this->session = \Config\Services::session();
        $this->session->start();

        $id_user = $this->session->get('id');
        $banner = $this->bModel->getBanner($id_banner);
        $data = [
            'tittle' => 'Detail News',
            'iduser' => $id_user,
            'banner' => $banner
        ];
        return view('etalase/daftarbaru', $data);
    }

    public function daftar_diskon($id_promo)
    {
        $this->session = \Config\Services::session();
        $this->session->start();

        $id_user = $this->session->get('id');
        $promo = $this->pmModel->getPromo($id_promo);
        $data = [
            'tittle' => 'Detail News',
            'iduser' => $id_user,
            'promo' => $promo
        ];
        return view('etalase/daftar_diskon', $data);
    }

    public function virtual()
    {
        $galeri = new \App\Models\GaleriModel();
        $model = $galeri->findAll();

        return view('virtualtour', [
            'model' => $model,

        ]);
    }

    public function history()
    {
        $transaksiModel = new TransaksiModel();
        $transaksi = $transaksiModel->findAll();

        return view('transaksi/history', [
            'transaksi' => $transaksi,
        ]);
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        $data = json_encode($response);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
