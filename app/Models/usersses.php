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

    protected $fillable = ['lastname','firstname','email','phone', 'password', 'role', 'verify'];

    public function authenticate($password)
    {
        return Hash::check($password, $this->password);
    }
    public function tokens()
    {
        return $this->hasMany(PersonalAccessToken::class, 'tokenable_id');
    }
}
