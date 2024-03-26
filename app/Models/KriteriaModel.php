<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id_kriteria';
    protected $returnType       = 'object';
    protected $allowedFields    = ['kode_kriteria', 'nama_kriteria', 'jenis_kriteria', 'bobot'];

    protected $validationRules = [
        'kode_kriteria'     => 'required',
        'nama_kriteria'     => 'required|min_length[3]'
    ];
    protected $validationMessages = [
        'kode_kriteria' => [
            'required' => 'Kode kriteria tidak boleh kosong',
        ],
        'nama_kriteria' => [
            'required'      => 'Nama kriteria tidak boleh kosong',
            'min_length'    => 'Inputan harus lebih 3 karakter'
        ],
    ];

}
