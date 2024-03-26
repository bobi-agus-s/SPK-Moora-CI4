<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;

class Subkriteria extends ResourcePresenter
{
    public function __construct()
    {
        $this->kriteria = new KriteriaModel();
        $this->subkriteria = new SubkriteriaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Sub Kriteria',
            'page'  => 'subkriteria',
            'kriteria'  => $this->kriteria->findAll(),
            'model_subkriteria'   => $this->subkriteria
        ];

        return view('subkriteria/index', $data);
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
        $this->subkriteria->insert($data);
        return redirect()->to(site_url('subkriteria'))->with('success', 'Berhasil menambah data');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah subkriteria',
            'page'  => 'subkriteria',
            'subkriteria'  => $this->subkriteria->find($id)
        ];

        $data['kriteria'] = $this->kriteria->find($data['subkriteria']->id_kriteria);

        return view('subkriteria/edit', $data);
    }

    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->subkriteria->update($id, $data);
        return redirect()->to(site_url('subkriteria'))->with('success' ,'data berhasil diubah');
    }

    
    public function remove($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        $this->subkriteria->delete($id);
        return redirect()->to(site_url('subkriteria'))->with('success', 'data berhasil dihapus');
    }
}
