<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companie extends Model
{
    use HasFactory;


    protected $fillable = [
        'Name',
        'Email',
        'Logo',
        'Website',

    ];
}
