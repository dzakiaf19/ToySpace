<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'user_id',
        'nama',
        'phone',
        'provinsi',
        'provinsi_id',
        'kota',
        'kota_id',
        'kode_pos',
        'alamat_lengkap',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
