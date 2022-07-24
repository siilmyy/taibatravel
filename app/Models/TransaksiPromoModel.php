<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiPromoModel extends Model
{
    protected $table = 'transaksipromo';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_promo', 'id_user', 'handphone', 'jumlah', 'total_harga', 'total_dp', 'status', 'alamat', 'order_id', 'payment_type', 'transaction_time', 'transaction_status', 'va_number', 'bank'
    ];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;

    // public function tampilDataTemp($id_banner)
    // {
    //     return $this->table('transaksi')->join('banner', 'id_banner=id_banner')->where('id_banner',$id_banner)->get();
    // }

}
