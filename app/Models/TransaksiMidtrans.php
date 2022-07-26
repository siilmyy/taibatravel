<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMidtransModel extends Model
{
    protected $table = 'transaksimidtrans';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_banner', 'id_user', 'nama_pembeli', 'nama', 'handphone', 'email', 'jumlah', 'total_harga', 'total_dp', 'status', 'alamat', 'order_id', 'payment_type', 'transaction_time', 'transaction_status', 'va_number', 'bank', 'created_at', 'updated_at'
    ];
    protected $returnType = 'App\Entities\Transaksi';
    protected $useTimestamps = false;
}
