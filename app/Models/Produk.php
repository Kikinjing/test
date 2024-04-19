<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $primaryKey = 'produk_id';
    protected $fillable = [
        'produk_id','nama_produk','harga','stok'
    ];

    public function detailPenjualan()
    {
        return $this->belongsTo(DetailPenjualan::class, 'detail_id', 'detail_id');
    }
}
