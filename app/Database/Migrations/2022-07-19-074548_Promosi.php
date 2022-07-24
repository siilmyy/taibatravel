<?php

namespace App\Database\Migrations;

class Promosi extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'id_promosi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama' => [
                'type' => 'TEXT',
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'harga_dp' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'harga_diskon' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'gambar' => [
                'type' => 'TEXT',
            ],
            'lama_tour' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'jenis_tour' => [
                'type' => 'ENUM',
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_date' => [
                'type' => 'DATETIME',
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'updated_date' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);

        $this->forge->addKey('id_promosi', TRUE);
        $this->forge->createTable('promosi');
    }

    public function down()
    {
        $this->forge->dropTable('promosi');
    }
}
