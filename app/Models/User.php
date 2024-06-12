<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUlids, HasRoles, SoftDeletes;

    // Untuk mencegah adanya user baru dengan email/phone yang sama dengan entry yang sudah dihapus
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($user) {
    //         $existingUser = User::withTrashed()->where('email', $user->email)->first();
    //         if ($existingUser) {
    //             $existingUser->restore();
    //             return false; // Mencegah proses penyimpanan baru
    //         }

    //         $existingPhone = User::withTrashed()->where('phone', $user->phone)->first();
    //         if ($existingPhone) {
    //             $existingPhone->restore();
    //             return false; // Mencegah proses penyimpanan baru
    //         }
    //     });
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'address',
        'birthdate',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function user_address()
    {
        return $this->hasMany(UserAddress::class);
    }
}
