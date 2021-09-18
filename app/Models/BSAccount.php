<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BSAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_student_id','author','des','in','out','bal'
    ];

    public function b_student()
     {
         return $this->belongsTo(BStudent::class);
     }

     public function b_s_a_entries()
    {
        return $this->hasMany(BSAEntry::class)->orderBy('updated_at', 'desc');
    }
}
