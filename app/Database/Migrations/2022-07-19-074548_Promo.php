<?php

namespace App\Database\Migrations;

class Promo extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'id_promo' => [
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
            'hotel' => [
                'type' => 'TEXT',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
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
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ]
        ]);

        $this->forge->addKey('id_promo', TRUE);
        $this->forge->createTable('promo');
    }

    public function down()
    {
        $this->forge->dropTable('promo');
    }
}
