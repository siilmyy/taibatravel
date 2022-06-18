<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $allowedFields = [
        'nama', 'harga', 'stok', 'gambar', 'lama_tour', 'deskripsi', 'id_kategori', 'created_by', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $returnType = 'App\Entities\Banner';
    protected $useTimestamps = false;
}
