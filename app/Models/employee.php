<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'F_name',
        'L_name',
        'Company',
        'Email',
        'Phone',
        'Profile',
    ];
}
