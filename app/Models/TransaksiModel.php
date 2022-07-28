<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_banner', 'id_user', 'nama_pembeli', 'nama', 'handphone', 'email', 'jumlah', 'total_harga', 'total_dp', 'status', 'alamat', 'order_id', 'payment_type', 'transaction_time', 'transaction_status', 'va_number', 'bank', 'created_at', 'updated_at'
    ];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;

    public function tampilDataTemp($id_banner)
    {
        return $this->table('transaksi')->join('banner', 'banner.id_banner=transaksi.id_banner')->where('id_banner', $id_banner)->get();
    }

    public function tampilDataUser($id_user)
    {
        return $this->table('transaksi')->join('userbaru', 'id_user=id_user')->where('id_user', $id_user)->get();
    }
}
