<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class usersses extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $table='usersses';


    protected $fillable = ['lastname','firstname','email','phone', 'password', 'role', 'verify'];
    public function account()
    {
        return $this->belongsTo(App\Models\usersses::class);
    }
    public function tokens()
{
    return $this->hasMany(PersonalAccessToken::class, 'tokenable_id');
}

    
    
}