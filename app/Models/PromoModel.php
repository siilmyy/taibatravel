<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
    protected $table = 'promo';
    protected $primaryKey = 'id_promo';
    protected $allowedFields = [
        'id_promo', 'nama', 'harga', 'harga_dp', 'harga_diskon', 'stok', 'gambar', 'lama_tour', 'hotel', 'deskripsi', 'id_kategori', 'created_by', 'created_date', 'updated_by', 'updated_date', 'deleted_at', 'harga_diskon'
    ];
    protected $returnType = 'App\Entities\Banner';
    protected $useTimestamps = false;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';
}
