<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'userbaru';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username', 'email', 'nama', 'gambar', 'password', 'salt', 'created_by', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;
}
