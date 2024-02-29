<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilUsaha extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_perusahaan',
        'singkatan',
        'visi',
        'isi',
        'logo',
        'alamat',
        'kodepos',
    ];

}
