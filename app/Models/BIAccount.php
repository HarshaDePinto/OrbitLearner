<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BIAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'g_batch_id','author','des','in','out','bal'
    ];

   

     public function g_batch()
     {
         return $this->belongsTo(GBatch::class);
     }

     public function b_i_a_entries()
    {
        return $this->hasMany(BIAEntry::class)->orderBy('updated_at', 'desc');
    }
}
