<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDelete extends Migration
{
    public function up()
    {
        $fields = [
            'deleted_at' => ['type' => 'DATETIME']
        ];
        $this->forge->addColumn('banner', $fields);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('banner', 'deleted_at');
    }
}
