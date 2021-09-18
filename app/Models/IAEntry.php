<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IAEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'i_account_id','author','des','type','amount'
    ];

    public function i_account()
     {
         return $this->belongsTo(IAccount::class);
     }
}
