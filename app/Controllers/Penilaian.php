<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use App\Models\PenilaianModel;

class Penilaian extends BaseController
{
    public function __construct()
    {
        $this->alternatif = new AlternatifModel();
        $this->kriteria = new KriteriaModel();
        $this->subkriteria = new SubkriteriaModel();
        $this->penilaian = new PenilaianModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Penilaian',
            'page'  => 'penilaian',
            'alternatif'    => $this->alternatif->findAll(),
            'model_penilaian'     => $this->penilaian
        ];

        return view('penilaian/index', $data);
    }

    public function input($id = null)
    {
        $data = [
            'title' => 'Input Penilaian',
            'page'  => 'penilaian',
            'alternatif'  => $this->alternatif->find($id),
            'kriteria'  => $this->kriteria->findAll(),
            'model_subkriteria' => $this->subkriteria
        ];

        return view('penilaian/input', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        for ($i = 0; $i < count($data['id_kriteria']); $i++) {
            $this->penilaian->insertData(
                $data['id_alternatif'],
                $data['id_kriteria'][$i],
                $data['id_sub_kriteria'][$i]
            );
        }
        return redirect()->to(site_url('penilaian'))->with('success', 'Berhasil menambah data');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Penilaian',
            'page'  => 'penilaian',
            'alternatif'  => $this->alternatif->find($id),
            'kriteria'  => $this->kriteria->findAll(),
            'model_subkriteria' => $this->subkriteria,
            'model_penilaian' => $this->penilaian,
        ];

        return view('penilaian/edit', $data);
    }

    public function update()
    {
        $data = $this->request->getPost();
        for ($i = 0; $i < count($data['id_kriteria']); $i++) {
            $this->penilaian->updateData($data['id_alternatif'], $data['id_kriteria'][$i], $data['id_sub_kriteria'][$i]);
        }
        return redirect()->to(site_url('penilaian'))->with('success', 'Data berhasil diubah');
    }
}
