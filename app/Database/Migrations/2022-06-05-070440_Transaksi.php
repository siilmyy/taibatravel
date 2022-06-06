<?php

namespace App\Database\Migrations;



class Transaksi extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_transaksi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_banner' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'id_pembeli' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_date' => [
                'type' => 'DATETIME',
            ],
            // 'updated_by' => [
            //     'type' => 'INT',
            //     'constraint' => 11,
            //     'null' => TRUE,
            // ],
            'updated_date' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);

        $this->forge->addKey('id_transaksi', TRUE);
        $this->forge->addForeignKey('id_banner', 'banner', 'id_banner');
        $this->forge->addForeignKey('id_pembeli', 'userbaru', 'id_user');
        $this->forge->createTable('transaksi');
        // $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
