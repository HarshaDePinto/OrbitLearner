<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BSAEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_s_account_id','author','des','type','amount'
    ];

    public function b_s_account()
     {
         return $this->belongsTo(BSAccount::class);
     }
}
