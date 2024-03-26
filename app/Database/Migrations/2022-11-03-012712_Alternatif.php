<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alternatif extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_alternatif' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_alternatif' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_alternatif', true);
        $this->forge->createTable('alternatif');
    }

    public function down()
    {
        $this->forge->dropTable('alternatif');
    }
}
