<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRelasiGejalaPenyakit extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_relasi' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            'auto_increment' => true,
        ],

        'kode_gejala' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
        ],

        'kode_penyakit' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
        ],
    ]);

    $this->forge->addKey('id_relasi', true);
    $this->forge->addForeignKey('kode_gejala', 'gejala', 'kode_gejala', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('kode_penyakit', 'penyakit', 'kode_penyakit', 'CASCADE', 'CASCADE');
    $this->forge->createTable('relasi_gejala_penyakit', true);
    }

    public function down()
    {
        $this->forge->dropTable('relasi_gejala_penyakit', true);
    }
}
