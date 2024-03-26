<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\KriteriaModel;

class Kriteria extends ResourcePresenter
{
    public function __construct()
    {
        $this->kriteria = new KriteriaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kriteria',
            'page'  => 'kriteria',
            'kriteria'  => $this->kriteria->findAll()
        ];

        return view('kriteria/index', $data);
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
        $save = $this->kriteria->insert($data);

        if (!$save) {
            return redirect()->back()->withInput()->with('error', $this->kriteria->errors());            
        } else {
            return redirect()->to(site_url('kriteria'))->with('success', 'Berhasil menambah data');
        }
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Kriteria',
            'page'  => 'kriteria',
            'kriteria'  => $this->kriteria->find($id)
        ];

        return view('kriteria/edit', $data);
    }

    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->kriteria->update($id, $data);
        return redirect()->to(site_url('kriteria'))->with('success' ,'data berhasil diubah');
    }

    
    public function remove($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        $this->kriteria->delete($id);
        return redirect()->to(site_url('kriteria'))->with('success', 'data berhasil dihapus');
    }

    
}
