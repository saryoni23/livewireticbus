<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Berita extends Model
{
    use HasFactory;
    public $table = 'berita';
    use SoftDeletes;

    protected $fillable = [
        'judul',
        'isi',
        'image',
        'is_active',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
