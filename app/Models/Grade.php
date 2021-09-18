<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','author',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class)->orderBy('updated_at', 'desc');
    }

    public function g_batches()
    {
        return $this->hasMany(GBatch::class)->orderBy('updated_at', 'desc');
    }
}
