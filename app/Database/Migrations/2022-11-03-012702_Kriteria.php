<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kriteria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_kriteria' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_kriteria' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jenis_kriteria' => [
                'type'       => 'ENUM',
                'constraint' => ['benefit', 'cost'],
                'default'    => 'benefit',
            ],
            'bobot' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_kriteria', true);
        $this->forge->createTable('kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kriteria');
    }
}
