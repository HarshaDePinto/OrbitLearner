<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GTutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active','group_id','title','author','doc'
     ];

     public function group()
     {
         return $this->belongsTo(Group::class);
     }

     public function b_tutorials()
     {
         return $this->hasMany(BTutorial::class)->orderBy('updated_at', 'desc');
     }
}
