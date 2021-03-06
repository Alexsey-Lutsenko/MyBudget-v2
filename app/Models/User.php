<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_id', 'id');
    }

    public function incomes()
    {
        return $this->belongsToMany(Income::class, 'user_id', 'id');
    }

    public function costs()
    {
        return $this->belongsToMany(Cost::class, 'user_id', 'id');
    }
}
