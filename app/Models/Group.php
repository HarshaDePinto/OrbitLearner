<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active','user_id','grade_id','subject_id','title','img1','img2','des1','des2','author'
    ];

    public function subject()
     {
         return $this->belongsTo(Subject::class);
     }
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function grade()
     {
         return $this->belongsTo(Grade::class);
     }

     public function g_batches()
    {
        return $this->hasMany(GBatch::class)->orderBy('updated_at', 'desc');
    }

    public function g_tutorials()
     {
         return $this->hasMany(GTutorial::class)->orderBy('updated_at', 'desc');
     }

     public function b_tutorials()
     {
         return $this->hasMany(BTutorial::class)->orderBy('updated_at', 'desc');
     }

     public function g_videos()
     {
         return $this->hasMany(GVideo::class)->orderBy('updated_at', 'desc');
     }

     public function b_videos()
     {
         return $this->hasMany(BVideo::class)->orderBy('updated_at', 'desc');
     }

     public function g_mcqs()
     {
         return $this->hasMany(GMcq::class)->orderBy('updated_at', 'desc');
     }

     public function b_mcqs()
     {
         return $this->hasMany(BMcq::class)->orderBy('updated_at', 'desc');
     }
}
