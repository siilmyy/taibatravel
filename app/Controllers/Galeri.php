<?php

namespace App\Controllers;

class Galeri extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $galeriModel = new \App\Models\galeriModel();
        $galeries = $galeriModel->findAll();

        return view('galeri/index', [
            'galeries' => $galeries,
        ]);
    }

    public function create()
    {
        if ($this->request->getPost()) {
            //jika ada data yang di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'galeri');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                //simpan datanya
                $galeriModel = new \App\Models\GaleriModel();

                $galeri = new \App\Entities\Galeri();

                $galeri->fill($data);
                $galeri->gambar = $this->request->getFile('gambar');

                $galeriModel->save($galeri);

                $id = $galeriModel->insertID();

                $segments = ['galeri', 'view', $id];

                return redirect()->to(site_url($segments));
            }
        }

        return view('galeri/create');
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);
        $modelgaleri = new \App\Models\galeriModel();
        $galeri = $modelgaleri->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'galeriupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\galeri();
                $b->id = $id;
                $b->fill($data);

                if ($this->request->getFile('gambar')->isValid()) {
                    $b->gambar = $this->request->getFile('gambar');
                }

                $modelgaleri->save($b);

                $segments = ['galeri', 'view', $id];


                return redirect()->to(base_url($segments));
            }
        }

        return view('galeri/update', [
            'galeri' => $galeri,
        ]);
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $galeriModel = new \App\Models\galeriModel();

        $galeri = $galeriModel->find($id);

        return view('galeri/view', [
            'galeri' => $galeri,

        ]);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);

        $modelgaleri = new \App\Models\GaleriModel();
        $delete = $modelgaleri->delete($id);

        $this->session->setFlashdata('success', 'Delete Lesson Learn Berhasil');

        return redirect()->to(site_url('galeri/index'));
    }
}
