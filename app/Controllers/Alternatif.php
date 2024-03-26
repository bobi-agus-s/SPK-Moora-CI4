<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\AlternatifModel;

class Alternatif extends ResourcePresenter
{
    public function __construct()
    {
        $this->alternatif = new AlternatifModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Alternatif',
            'page'  => 'alternatif',
            'alternatif'  => $this->alternatif->findAll()
        ];

        return view('alternatif/index', $data);
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
        $validate = $this->validate([
            'nama_alternatif' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'      => 'Nama alternatif tidak boleh kosong.',
                    'min_length'    =>  'Inputan minimal 2 karakter',
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambah data');
        }

        $data = $this->request->getPost();
        $this->alternatif->insert($data);
        return redirect()->to(site_url('alternatif'))->with('success', 'Berhasil menambah data');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah alternatif',
            'page'  => 'alternatif',
            'alternatif'  => $this->alternatif->find($id)
        ];

        return view('alternatif/edit', $data);
    }

    
    public function update($id = null)
    {

        $validate = $this->validate([
            'nama_alternatif' => [
                'rules'  => 'required|min_length[2]',
                'errors' => [
                    'required'      => 'Nama alternatif tidak boleh kosong.',
                    'min_length'    =>  'Inputan minimal 2 karakter',
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data');
        }


        $data = $this->request->getPost();
        $this->alternatif->update($id, $data);
        return redirect()->to(site_url('alternatif'))->with('success' ,'data berhasil diubah');
    }

    
    public function remove($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        $this->alternatif->delete($id);
        return redirect()->to(site_url('alternatif'))->with('success', 'data berhasil dihapus');
    }
}
