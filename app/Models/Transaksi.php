<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'tbl_transaksi';
    protected $fillable = [
        'user_id',
        'tiket_id',
        'jumlah_kursi',
        'nomor_kursi',
        'total_bayar'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function rute():BelongsTo
    {
        return $this->belongsTo(Rute::class);
    }
    public function kategori():BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function tiket():BelongsTo
    {
        return $this->belongsTo(Tiket::class);
    }
    
}
