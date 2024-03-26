<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
   protected $table            = 'penilaian';
   protected $primaryKey       = 'id_penilaian';
   protected $returnType       = 'object';
   protected $allowedFields    = ['id_alternatif', 'id_kriteria', 'id_sub_kriteria'];

   public function getDataByAlternatif($id_alternatif)
   {
      $builder = $this->db->table($this->table)
                           ->where('id_alternatif', $id_alternatif);
      return $builder->get()->getResult();
   }

   public function insertData($id_alternatif, $id_kriteria, $id_sub_kriteria)
   {
      $data = [
         'id_alternatif'   => $id_alternatif,
         'id_kriteria'     => $id_kriteria,
         'id_sub_kriteria'     => $id_sub_kriteria,
      ];
      return $this->db->table($this->table)->insert($data);
   }

   public function getPenilaian($id_alternatif, $id_kriteria)
   {
      $builder = $this->db->table($this->table)
                           ->where([
                              'id_alternatif'   => $id_alternatif,
                              'id_kriteria'     => $id_kriteria
                           ]);
      return $builder->get()->getRow();
   }

   public function updateData($id_alternatif, $id_kriteria, $id_sub_kriteria)
   {
      $builder = $this->db->table($this->table)
                           ->set('id_sub_kriteria', $id_sub_kriteria)
                           ->where([
                              'id_alternatif' => $id_alternatif,
                              'id_kriteria' => $id_kriteria
                           ])
                           ->update();
   }

}
