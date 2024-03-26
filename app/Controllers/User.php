<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\UserModel;

class User extends ResourcePresenter
{
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'page'  => 'user',
            'user'  => $this->user->findAll()
        ];

        return view('user/index', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        //
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->user->insert($data);
        return redirect()->to(site_url('user'))->with('success', 'Berhasil menambah data');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah user',
            'page'  => 'user',
            'user'  => $this->user->find($id)
        ];

        return view('user/edit', $data);
    }

    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->user->update($id, $data);
        return redirect()->to(site_url('user'))->with('success' ,'data berhasil diubah');
    }

    
    public function remove($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        $this->user->delete($id);
        return redirect()->to(site_url('user'))->with('success', 'data berhasil dihapus');
    }

    public function profil()
    {
        $data = [
            'title' => 'profil',
            'page'  => 'profil',
            'user'  => $this->user->find(session('id_user'))
        ];
        return view('user/profil', $data);
    }
}
