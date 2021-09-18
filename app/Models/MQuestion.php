<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'g_mcq_id','number','marks','ans','q_img','s_img','s_audio','s_vid','s_des','author'
     ];

     public function g_mcq()
     {
         return $this->belongsTo(GMcq::class);
     }

     public function m_results()
     {
         return $this->hasMany(MResult::class)->orderBy('updated_at', 'desc');
     }
}
