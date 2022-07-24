<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'nama', 'gambar'
    ];
    protected $returnType = 'App\Entities\Galeri';
    protected $useTimestamps = false;
}
