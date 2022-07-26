<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Promo extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $promoModel = new \App\Models\promoModel();
        $promos = $promoModel->findAll();

        return view('promo/index', [
            'promos' => $promos,
        ]);
    }

    public function trashed()
    {
        $promoModel = new \App\Models\promoModel();
        $promos = $promoModel->onlyDeleted()->findAll();

        return view('promo/trashed', [
            'promos' => $promos,
        ]);
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $promoModel = new \App\Models\promoModel();

        $promo = $promoModel->find($id);

        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->find($promo->id_kategori);

        return view('promo/view', [
            'promo' => $promo,
            'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            //jika ada data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'promo');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                //simpan datanya
                $promoModel = new \App\Models\promoModel();

                $promo = new \App\Entities\Banner();

                $promo->fill($data);
                $promo->gambar = $this->request->getFile('gambar');
                $promo->created_by = 0;
                $promo->created_date = date("Y-m-d H:i:s");

                $promoModel->save($promo);

                $id = $promoModel->insertID();

                $segments = ['promo', 'view', $id];

                $this->session->setFlashData('success', "Input Data Berhasil");
                // /promo/view/$id
                return redirect()->to(site_url($segments));
            }
        }
        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->findAll();

        $arrayKategori = null;

        foreach ($kategori as $k) {
            $arrayKategori[$k->id] = $k->kategori;
        }
        return view('promo/create', [
            // 'promoModel' => $promoModel,
            'arrayKategori' => $arrayKategori,
        ]);
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);
        $modelpromo = new \App\Models\promoModel();
        $promo = $modelpromo->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'promoupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\Banner();
                $b->id_promo = $id;
                $b->fill($data);

                if ($this->request->getFile('gambar')->isValid()) {
                    $b->gambar = $this->request->getFile('gambar');
                }

                $b->updated_by = $this->session->get('id_user');
                $b->updated_at = date("Y-m-d H:i:s");

                $modelpromo->save($b);

                $segments = ['promo', 'view', $id];


                return redirect()->to(base_url($segments));
            }
        }

        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->findAll();

        $arrayKategori = null;

        foreach ($kategori as $k) {
            $arrayKategori[$k->id] = $k->kategori;
        }

        return view('promo/update', [
            'promo' => $promo,
            'arrayKategori' => $arrayKategori,
        ]);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);

        $modelpromo = new \App\Models\promoModel();
        $delete = $modelpromo->delete($id);

        $this->session->setFlashdata('success', 'Delete Lesson Learn Berhasil');

        return redirect()->to(site_url('promo/index'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            $this->db = \Config\Database::connect();
            $this->db->table('promo')
                ->set('deleted_at', null, true)
                ->where(['id_promo' => $id])
                ->update();
        }

        return redirect()->to(site_url('promo/index'))->with('success', 'Data berhasil direstore');
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $modelpromo = new \App\Models\promoModel();
            $delete = $modelpromo->delete($id, true);

            $this->session->setFlashdata('success', 'Delete Lesson Learn Berhasil');

            return redirect()->to(site_url('promo/trashed'));
        }
    }
}
