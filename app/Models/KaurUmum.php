<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\HasProfilePhoto;

class KaurUmum extends Authenticatable
{
    protected $table = 'kaur_umum';

    use HasFactory, HasProfilePhoto;

    protected $primaryKey = 'id_kaur_umum';

    protected $fillable = [
        'email',
        'password',
        'nama',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];
}
