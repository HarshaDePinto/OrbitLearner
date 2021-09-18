<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_active','group_id','title','author','vid'
     ];

     public function group()
     {
         return $this->belongsTo(Group::class);
     }

     public function b_videos()
     {
         return $this->hasMany(BVideo::class)->orderBy('updated_at', 'desc');
     }
}
