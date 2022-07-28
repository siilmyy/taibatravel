<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeleteGaleri extends Migration
{
    public function up()
    {
        $fields = [
            'deleted_at' => ['type' => 'DATETIME']
        ];
        $this->forge->addColumn('galeri', $fields);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('galeri', 'deleted_at');
    }
}
