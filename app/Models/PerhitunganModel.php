<?php

namespace App\Models;

use CodeIgniter\Model;

class PerhitunganModel extends Model
{
    protected $table            = 'penilaian';
    protected $primaryKey       = 'id_penilaian';
    protected $returnType       = 'object';

    public function getNilai($id_alternatif, $id_kriteria)
    {
        $builder = $this->db->table('penilaian')
                            ->select('sub_kriteria.nilai')
                            ->join('sub_kriteria', 'sub_kriteria.id_sub_kriteria = penilaian.id_sub_kriteria')
                            ->where([
                                'penilaian.id_alternatif' => $id_alternatif,
                                'penilaian.id_kriteria'   => $id_kriteria
                            ]);
        return $builder->get()->getRow();
    }

    public function getHasil()
    {
        $builder = $this->db->table('hasil')
                            ->join('alternatif', 'alternatif.id_alternatif = hasil.id_alternatif')
                            ->orderBy('hasil', 'desc');
        return $builder->get()->getResult();
    }

    public function insertHasil($id_alternatif, $hasil)
    {
        $data = [
            'id_alternatif' => $id_alternatif,
            'hasil'         => $hasil
        ]; 
        return $this->db->table('hasil')->insert($data);
    }

    public function deleteAllHasil()
    {
        return $this->db->table('hasil')->truncate();
    }


    public function getPenyebut($id_kriteria)
    {
        // SELECT SUM(pow(sub_kriteria.nilai, 2)) FROM penilaian 
        // JOIN sub_kriteria
        // ON sub_kriteria.id_sub_kriteria = penilaian.id_sub_kriteria
        // WHERE penilaian.id_kriteria = 1

        $builder = $this->db->table('penilaian')
                            ->select('sqrt(sum(pow(sub_kriteria.nilai, 2))) as nilai')
                            ->join('sub_kriteria', 'sub_kriteria.id_sub_kriteria = penilaian.id_sub_kriteria')
                            ->where('penilaian.id_kriteria', $id_kriteria);
        return $builder->get()->getRow();
    }

}
