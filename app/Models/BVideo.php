<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'g_video_id','is_active','group_id','g_batch_id','author'
     ];

     public function group()
     {
         return $this->belongsTo(Group::class);
     }
     public function g_video()
     {
         return $this->belongsTo(GVideo::class);
     }

     public function g_batch()
     {
         return $this->belongsTo(GBatch::class);
     }
}
