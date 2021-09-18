<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BIAEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'b_i_account_id','author','des','type','amount'
    ];

    public function b_i_account()
     {
         return $this->belongsTo(BIAccount::class);
     }
}
