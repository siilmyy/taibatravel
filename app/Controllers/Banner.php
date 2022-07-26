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

    public function trashed()
    {
        $bannerModel = new \App\Models\bannerModel();
        $banners = $bannerModel->onlyDeleted()->findAll();

        return view('banner/trashed', [
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
            $validate = $this->validation->run($data, 'banner');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                //simpan datanya
                $bannerModel = new \App\Models\bannerModel();
                $PromoModel = new \App\Models\PromoModel();

                $banner = new \App\Entities\banner();

                $banner->fill($data);
                $banner->gambar = $this->request->getFile('gambar');
                $banner->created_by = 0;
                $banner->created_date = date("Y-m-d H:i:s");

                $bannerModel->save($banner);
                $PromoModel->save($banner);

                $id = $bannerModel->insertID();

                $segments = ['banner', 'view', $id];

                session()->setflashdata('pesan', 'Data berhasil ditambahkan!!!');
                session()->setFlashdata('alert-class', 'alert-success');
                // /banner/view/$id
                return redirect()->to(site_url($segments));
            }
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
        $modelbanner = new \App\Models\bannerModel();
        $banner = $modelbanner->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'bannerupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\banner();
                $b->id_banner = $id;
                $b->fill($data);

                if ($this->request->getFile('gambar')->isValid()) {
                    $b->gambar = $this->request->getFile('gambar');
                }

                $b->updated_by = $this->session->get('id_user');
                $b->updated_at = date("Y-m-d H:i:s");

                $modelbanner->save($b);

                $segments = ['banner', 'view', $id];

                session()->setflashdata('pesan', 'Data berhasil diubah!!!');
                session()->setFlashdata('alert-class', 'alert-success');

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
        $id = $this->request->uri->getSegment(3);

        $modelBanner = new \App\Models\BannerModel();
        $delete = $modelBanner->delete($id);

        $this->session->setFlashdata('success', 'Delete Lesson Learn Berhasil');

        return redirect()->to(site_url('banner/index'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            $this->db = \Config\Database::connect();
            $this->db->table('banner')
                ->set('deleted_at', null, true)
                ->where(['id_banner' => $id])
                ->update();
        }

        return redirect()->to(site_url('banner/index'))->with('success', 'Data berhasil direstore');
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $modelBanner = new \App\Models\BannerModel();
            $delete = $modelBanner->delete($id, true);

            $this->session->setFlashdata('success', 'Delete Lesson Learn Berhasil');

            return redirect()->to(site_url('banner/trashed'));
        }
    }

    public function uploadImages()
    {
        $validated = $this->validate([
            'upload' => [
                'uploaded[upload]',
                'mime_in[upload,image/jpg,image/jpeg,image/png]',
                'max_size[upload,1024]',
            ],
        ]);

        if ($validated) {
            $file = $this->request->getFile('upload');
            $fileName = $file->getRandomName();
            $writePath = './uploads';
            $file->move($writePath, $fileName);
            $data = [
                "uploaded" => true,
                "url" => base_url('uploads/' . $fileName),
            ];
        } else {
            $data = [
                "uploaded" => false,
                "error"
            ];
        }

        return $this->response->setJSON($data);
    }
}
