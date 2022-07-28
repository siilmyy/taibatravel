<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index($id_user)
    {
        $model = new \App\Models\UserModel();
        $users = $model->find($id_user);

        return view('user/view', [
            'users' => $users,
        ]);
    }

    public function profile()
    {
        // $model = new \App\Models\UserModel();
        // $users = $model->find($id_user);

        return view('user/view');
    }

    public function riwayat()
    {
        // $model = new \App\Models\UserModel();
        // $users = $model->find($id_user);

        return view('user/riwayat');
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);
        $modeluser = new \App\Models\userModel();
        $user = $modeluser->find($id);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'registerupdate');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $b = new \App\Entities\user();
                $b->id_user = $id;
                $b->fill($data);

                if ($this->request->getFile('gambar')->isValid()) {
                    $b->gambar = $this->request->getFile('gambar');
                }

                $b->updated_by = $this->session->get('id_user');
                $b->updated_at = date("Y-m-d H:i:s");

                $modeluser->save($b);

                $segments = ['user', 'view', $id];

                session()->setflashdata('pesan', 'Data berhasil diubah!!!');
                session()->setFlashdata('alert-class', 'alert-success');

                return redirect()->to(base_url($segments));
            }
        }
        return view('user/update', [
            'user' => $user,
        ]);
    }
}
