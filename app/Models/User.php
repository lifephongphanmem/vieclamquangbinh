<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Messagable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'category',
        'public',
        'level',
        'madv',
        'maxa',
        'mahuyen',
        'matinh',
        'username',
        'phanloaitk',
        'status',
        'sadmin',
        'solandn',
        'manhomchucnang',
        'nhaplieu',
        'tonghop',
        'hethong',
        'chucnangkhac',
        'capdo',
        'madvbc',
        'ngaysinh',
        'gioitinh',
        'cccd',
        'sdt',
        'diachi',
        'mataikhoan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
