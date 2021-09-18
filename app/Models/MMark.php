<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMark extends Model
{
    use HasFactory;
    protected $fillable = [
        'b_student_id','b_mcq_id','paper_mark','student_mark','average',
     ];

     public function b_student()
     {
         return $this->belongsTo(BStudent::class);
     }

     public function b_mcq()
     {
         return $this->belongsTo(BMcq::class);
     }

     public function m_results()
     {
         return $this->hasMany(MResult::class)->orderBy('q_number', 'asc');
     }
}
