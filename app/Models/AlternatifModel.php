<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table            = 'alternatif';
    protected $primaryKey       = 'id_alternatif';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_alternatif'];
}
