<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKriteriaModel extends Model
{
    protected $table            = 'sub_kriteria';
    protected $primaryKey       = 'id_sub_kriteria';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_kriteria', 'deskripsi', 'nilai'];

    public function getDataByKriteria($id_kriteria)
    {
        $builder = $this->db->table($this->table)
                            ->where('id_kriteria', $id_kriteria);
        return $builder->get()->getResult();
    }

}
