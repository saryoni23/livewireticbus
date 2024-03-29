<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;
    public $table = 'tbl_kategori';
    protected $fillable = [
        'name'
    ];

    public function tiketKategori():HasMany
    {
        return $this->hasMany(Tiket::class);
    }
    public function serviceKategori():HasMany
    {
        return $this->hasMany(Tiket::class);
    }
}
