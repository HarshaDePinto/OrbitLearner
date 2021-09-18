<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    use HasFactory;
    protected $fillable = [
        'g_batch_id','author','status','topic','agenda','meeting_type','meeting_id','meeting_password','assistant_id','host_id','join_url','start_time','start_url'
    ];

    public function g_batch()
    {
        return $this->belongsTo(GBatch::class);
    }
}
