<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSolusiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_solusi' => [
                'type' => 'INT',
                'constraint' => 5,
                'primary' => true,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'kode_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'solusi_pengobatan' => [
                'type' => 'TEXT',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_solusi', true);
        $this->forge->addForeignKey('kode_penyakit', 'penyakit', 'kode_penyakit', 'CASCADE', 'CASCADE');
        $this->forge->createTable('solusi_pengobatan', true);
    }

    public function down()
    {
        $this->forge->dropTable('solusi', true);
    }
}
