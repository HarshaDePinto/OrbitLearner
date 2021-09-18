<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','des'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
