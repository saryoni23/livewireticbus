<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function PHPSTORM_META\type;

class Car extends Model
{
    use HasFactory;
    protected $fillable =[
        'name'
    ];
    
    public function type():HasMany
    { 
        return $this->hasMany(Type::class);
    }
}
