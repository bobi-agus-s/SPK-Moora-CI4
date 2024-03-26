<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penilaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penilaian' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_alternatif' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_kriteria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_sub_kriteria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id_penilaian', true);
        $this->forge->createTable('penilaian');
    }

    public function down()
    {
        $this->forge->dropTable('penilaian');
    }
}
