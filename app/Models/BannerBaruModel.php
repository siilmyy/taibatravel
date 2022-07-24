<?php

namespace App\Models;

use CodeIgniter\Model;
use \Config\Database;

class BannerBaruModel extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $allowedFields = [
        'id_banner', 'nama', 'harga', 'harga_dp', 'stok', 'gambar', 'lama_tour', 'hotel', 'deskripsi', 'id_kategori', 'created_by', 'created_date', 'updated_by', 'updated_date', 'deleted_at'
    ];
    // protected $returnType = 'App\Entities\Banner';
    protected $useTimestamps = false;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    public function getBanner($id_banner = false)
    {
        if ($id_banner == false) {
            return $this->findAll();
        }

        return $this->where(['id_banner' => $id_banner])->first();
    }

    public function getStok($id_banner = false)
    {
        if ($id_banner == false) {
            return $this->findAll();
        }

        return $this->where(['id_banner' => $id_banner])->first();
    }
}
