<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubKriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sub_kriteria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kriteria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nilai' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_sub_kriteria', true);
        $this->forge->createTable('sub_kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('sub_kriteria');
    }
}
