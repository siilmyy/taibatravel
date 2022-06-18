<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Banner extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $bannerModel = new \App\Models\bannerModel();
        $banners = $bannerModel->findAll();

        return view('banner/index', [
            'banners' => $banners,
        ]);
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $bannerModel = new \App\Models\bannerModel();

        $banner = $bannerModel->find($id);

        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->find($banner->id_kategori);

        return view('banner/view', [
            'banner' => $banner,
            'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            //jika ada data yang di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'banner');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                //simpan datanya
                $bannerModel = new \App\Models\bannerModel();

                $banner = new \App\Entities\banner();

                $banner->fill($data);
                $banner->gambar = $this->request->getFile('gambar');
                $banner->created_by = 0;
                $banner->created_date = date("Y-m-d H:i:s");

                $bannerModel->save($banner);

                $id = $bannerModel->insertID();

                $segments = ['banner', 'view', $id];

                $this->session->setFlashData('success', "Input Data Berhasil");
                // /banner/view/$id
                return redirect()->to(site_url($segments));
            }
            $this->session->setFlashdata('errors', $errors);
        }
        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->findAll();

        $arrayKategori = null;

        foreach ($kategori as $k) {
            $arrayKategori[$k->id] = $k->kategori;
        }
        return view('banner/create', [
            // 'bannerModel' => $bannerModel,
            'arrayKategori' => $arrayKategori,
        ]);
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);

        $bannerModel = new \App\Models\bannerModel();

        $banner = $bannerModel->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'bannerupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\banner();
                $b->id = $id;
                $b->fill($data);

                if ($this->request->getFile('gambar')->isValid()) {
                    $b->gambar = $this->request->getFile('gambar');
                }

                $b->updated_by = $this->session->get('id');
                $b->updated_date = date("Y-m-d H:i:s");

                $bannerModel->save($b);

                $segments = ['banner', 'view', $id];

                return redirect()->to(base_url($segments));
            }
        }

        $modelKategori = new KategoriModel();
        $kategori = $modelKategori->findAll();

        $arrayKategori = null;

        foreach ($kategori as $k) {
            $arrayKategori[$k->id] = $k->kategori;
        }

        return view('banner/update', [
            'banner' => $banner,
            'arrayKategori' => $arrayKategori,
        ]);
    }

    public function delete()
    {
        // retur nview('banner/index');
    }
}
