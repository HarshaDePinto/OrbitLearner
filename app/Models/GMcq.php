<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GMcq extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active','type','group_id','title','number','time','author'
     ];

     public function group()
     {
         return $this->belongsTo(Group::class);
     }

     public function m_questions()
     {
         return $this->hasMany(MQuestion::class)->orderBy('number', 'asc');
     }

     public function b_mcqs()
     {
         return $this->hasMany(BMcq::class);
     }
}
