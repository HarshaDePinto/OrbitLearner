<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','g_batch_id','author','status','type'
    ];

    public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function g_batch()
     {
         return $this->belongsTo(GBatch::class);
     }

     public function b_payments()
     {
         return $this->hasMany(BPayment::class)->orderBy('updated_at', 'desc');
     }

     public function m_marks()
     {
         return $this->hasMany(MMark::class)->orderBy('updated_at', 'desc');
     }

     public function m_results()
     {
         return $this->hasMany(MResult::class)->orderBy('updated_at', 'desc');
     }

     public function b_s_accounts()
     {
         return $this->hasMany(BSAccount::class)->orderBy('updated_at', 'desc');
     }

}
