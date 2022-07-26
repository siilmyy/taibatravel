<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $allowedFields = [
        'id_banner', 'nama', 'harga', 'harga_dp', 'stok', 'gambar', 'lama_tour', 'hotel', 'deskripsi', 'id_kategori', 'created_by', 'created_date', 'updated_by', 'updated_date', 'deleted_at'
    ];
    protected $returnType = 'App\Entities\Banner';
    protected $useTimestamps = false;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';
}
