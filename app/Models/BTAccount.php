<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BTAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','g_batch_id','author','des','in','out','bal'
    ];

    public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function g_batch()
     {
         return $this->belongsTo(GBatch::class);
     }

     public function b_t_a_entries()
    {
        return $this->hasMany(BTAEntry::class)->orderBy('updated_at', 'desc');
    }
}
