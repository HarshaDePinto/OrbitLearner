<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','author','des','in','out','bal'
    ];

    public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function u_a_entries()
    {
        return $this->hasMany(UAEntry::class)->orderBy('updated_at', 'desc');
    }
}
