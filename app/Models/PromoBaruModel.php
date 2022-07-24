<?php

namespace App\Models;

use CodeIgniter\Model;
use \Config\Database;

class PromoBaruModel extends Model
{
    protected $table = 'promo';
    protected $primaryKey = 'id_promo';
    protected $allowedFields = [
        'id_promo', 'nama', 'harga', 'harga_dp', 'stok', 'gambar', 'lama_tour', 'hotel', 'deskripsi', 'id_kategori', 'created_by', 'created_date', 'updated_by', 'updated_date', 'deleted_at'
    ];
    // protected $returnType = 'App\Entities\Banner';
    protected $useTimestamps = false;
    protected $useSoftDeletes = true;


    public function getPromo($id_promo = false)
    {
        if ($id_promo == false) {
            return $this->findAll();
        }

        return $this->where(['id_promo' => $id_promo])->first();
    }

    public function getStok($id_promo = false)
    {
        if ($id_promo == false) {
            return $this->findAll();
        }

        return $this->where(['id_promo' => $id_promo])->first();
    }
}
