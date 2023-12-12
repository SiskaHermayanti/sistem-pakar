<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGejalaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_gejala' => [
                'type' => 'VARCHAR',
                'constraint' => '255', // Sesuaikan constraint dengan kebutuhan
                'primary' => true,
            ],

            'gejala' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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

        $this->forge->addKey('kode_gejala', true, true);
        $this->forge->createTable('gejala');
    }

    public function down()
    {
        $this->forge->dropTable('gejala', true);
    }
}
