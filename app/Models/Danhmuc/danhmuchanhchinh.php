<?php

namespace App\Models\Danhmuc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuchanhchinh extends Model
{
    use HasFactory;
    protected $table = 'danhmuchanhchinh';
    protected $fillable = [
        'public', 'kv', 'name','description','level','parent','maquocgia','madvql','capdo'
    ];
}

