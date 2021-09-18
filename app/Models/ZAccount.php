<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','email','key','secret','author'
    ];
}
