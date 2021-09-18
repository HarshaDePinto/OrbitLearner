<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_student_id','b_mcq_id','m_mark_id','m_question_id','q_number','q_answer','s_answer','result','q_mark','s_mark'
     ];

     public function b_student()
     {
         return $this->belongsTo(BStudent::class);
     }

     public function b_mcq()
     {
         return $this->belongsTo(BMcq::class);
     }

     public function m_mark()
     {
         return $this->belongsTo(MMark::class);
     }

     public function m_question()
     {
         return $this->belongsTo(MQuestion::class);
     }
}
