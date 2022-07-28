<?php

namespace App\Database\Migrations;

class TransaksiAlterFk extends \CodeIgniter\Database\Migration
{

    public function up()
    {

        $this->forge->dropForeignKey('transaksi', 'transaksi_id_banner_foreign');
        $this->forge->dropForeignKey('transaksi', 'transaksi_id_pembeli_foreign');

        $this->forge->addColumn('transaksi', [
            'CONSTRAINT transaksi_id_pembeli_foreign FOREIGN KEY(id_pembeli) REFERENCES userbaru(id_user) ON DELETE NO ACTION ON UPDATE CASCADE',
        ]);

        $this->forge->addColumn('transaksi', [
            'CONSTRAINT transaksi_id_banner_foreign FOREIGN KEY(id_banner) REFERENCES banner(id_banner) ON DELETE NO ACTION ON UPDATE CASCADE',
        ]);
    }
    public function down()
    {
        $this->forge->addColumn('transaksi', [
            'CONSTRAINT transaksi_id_pembeli_foreign FOREIGN KEY(id_pembeli) REFERENCES userbaru(id_user)',
        ]);

        $this->forge->addColumn('transaksi', [
            'CONSTRAINT transaksi_id_banner_foreign FOREIGN KEY(id_banner) REFERENCES banner(id_banner)',
        ]);
    }
}
