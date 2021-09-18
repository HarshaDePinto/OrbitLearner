<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BTAEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_t_account_id','author','des','type','amount'
    ];

    public function b_t_account()
     {
         return $this->belongsTo(BTAccount::class);
     }
}
