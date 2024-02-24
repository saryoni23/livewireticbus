<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rute extends Model
{
    use HasFactory;
    public $table = 'tbl_rute';
    protected $fillable = [
        'kota_asal',
        'kota_tujuan',
        'jam_berangkat',
        'is_active',
    ];

    public function tiket():HasMany
    {
        return $this->hasMany(Tiket::class);
    }
    public function transaksi():HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
