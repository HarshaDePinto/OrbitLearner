<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active','type','user_id','grade_id','subject_id','group_id','title','year','day','cat','start','end','fees','teacher_commission','author'
    ];

    public function subject()
     {
         return $this->belongsTo(Subject::class);
     }
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function group()
     {
         return $this->belongsTo(Group::class);
     }

     public function grade()
     {
         return $this->belongsTo(Grade::class);
     }

     public function b_students()
    {
        return $this->hasMany(BStudent::class)->orderBy('updated_at', 'desc');
    }

    public function b_payments()
    {
        return $this->hasMany(BPayment::class)->orderBy('updated_at', 'desc');
    }

    public function onlines()
    {
        return $this->hasMany(Online::class)->orderBy('updated_at', 'desc');
    }

    public function b_tutorials()
    {
        return $this->hasMany(BTutorial::class)->orderBy('updated_at', 'desc');
    }

    public function b_videos()
    {
        return $this->hasMany(BVideo::class)->orderBy('updated_at', 'desc');
    }

    public function b_mcqs()
    {
        return $this->hasMany(BMcq::class)->orderBy('updated_at', 'desc');
    }

    public function b_t_accounts()
    {
        return $this->hasMany(BTAccount::class)->orderBy('updated_at', 'desc');
    }
}
