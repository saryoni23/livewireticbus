<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    const ROLE_ADMIN    = "ADMIN";
    const ROLE_KARYAWAN = "KARYAWAN";
    const ROLE_USER     = "USER";

    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_KARYAWAN => 'Karyawan',
        self::ROLE_USER => 'User',
    ];

    const ROLE_DEFAULT = self::ROLE_USER;


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin() || $this->isKaryawan();
    }

    public function isAdmin(){
        return $this->role === self::ROLE_ADMIN;
    }

    public function isKaryawan(){
        return $this->role === self::ROLE_KARYAWAN;
    }





    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'role',
        'tgllahir',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];




    public function tiket(): HasMany
    {
        return $this->hasMany(Tiket::class);
    }
    public function transaksi(): HasMany
    {
        return $this->hasMany(Tiket::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'post_like')->withTimestamps();
    }

    public function hasLiked(Post $post)
    {
        return $this->likes()->where('post_id', $post->id)->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
