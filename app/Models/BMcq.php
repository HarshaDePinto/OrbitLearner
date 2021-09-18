<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMcq extends Model
{
    use HasFactory;

    protected $fillable = [
        'g_mcq_id','is_active','group_id','g_batch_id','author'
     ];

     public function group()
     {
         return $this->belongsTo(Group::class);
     }
     public function g_mcq()
     {
         return $this->belongsTo(GMcq::class);
     }

     public function g_batch()
     {
         return $this->belongsTo(GBatch::class);
     }

     public function m_marks()
     {
         return $this->hasMany(MMark::class)->orderBy('updated_at', 'desc');
     }
     public function m_results()
     {
         return $this->hasMany(MResult::class)->orderBy('updated_at', 'desc');
     }
}
