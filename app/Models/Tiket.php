<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tiket extends Model
{
    use HasFactory;
    public $table = 'tbl_tiket';
    protected $fillable = [
        'rute_id',
        'kategori_id',
        'nama_tiket',
        'nama_supir',
        'harga',
        'jumlah_tiket'
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
    public function transaksi():HasMany
    {
        return $this->hasMany(Tiket::class);
    }
}
