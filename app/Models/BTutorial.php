<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BTutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'g_tutorial_id','is_active','group_id','g_batch_id','author'
     ];

     public function group()
     {
         return $this->belongsTo(Group::class);
     }
     public function g_tutorial()
     {
         return $this->belongsTo(GTutorial::class);
     }

     public function g_batch()
     {
         return $this->belongsTo(GBatch::class);
     }
}
