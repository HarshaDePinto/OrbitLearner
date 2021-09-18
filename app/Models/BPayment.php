<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','g_batch_id','b_student_id','code','author','amount','status','method','year','month'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function g_batch()
    {
        return $this->belongsTo(GBatch::class);
    }

    public function b_student()
    {
        return $this->belongsTo(BStudent::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class)->orderBy('updated_at', 'desc');
    }
}
