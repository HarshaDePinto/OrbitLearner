<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UAEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'u_account_id','author','des','type','amount'
    ];

    public function u_account()
     {
         return $this->belongsTo(UAccount::class);
     }
}
