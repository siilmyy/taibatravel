<?php

namespace App\Database\Migrations;



class TransaksiMidtrans extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'nama_pembeli' => [
                'type' => 'TEXT',
            ],
            'nama' => [
                'type' => 'TEXT',
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'handphone' => [
                'type' => 'VARCHAR',
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total_dp' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'order_id' => [
                'type' => 'CHAR',
                'constraint' => 20,
            ],
            'payment_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'transaction_time' => [
                'type' => 'DATETIME',
            ],
            'transaction_status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'pdf_url' => [
                'type' => 'VARCHAR',
                'constraint' => 256,
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        // $this->forge->addForeignKey('id_banner', 'banner', 'id_banner');
        // $this->forge->addForeignKey('id_pembeli', 'userbaru', 'id_user');
        $this->forge->createTable('transaksimidtrans');
        // $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('transaksimidtrans');
    }
}
