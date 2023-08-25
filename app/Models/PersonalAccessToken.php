<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // Thêm 'name' vào đây nếu trường "name" cần được gán mass assignment
        'tokenable_type',
        'tokenable_id',
        'token',
        'abilities',
        'last_used_at',
        'expires_at'
        // Các trường khác...
    ];
}
