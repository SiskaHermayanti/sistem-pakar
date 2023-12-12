<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyakitTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => '255', // Sesuaikan constraint dengan kebutuhan
                'primary' => true,
            ],

            'penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'deskripsi_penyakit' => [
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

        $this->forge->addKey('kode_penyakit', true, true, true);
        $this->forge->createTable('penyakit');
        $this->forge->createTable('deskripsi_penyakit');
    }

    public function down()
    {
        $this->forge->dropTable('penyakit', true);
    }
}