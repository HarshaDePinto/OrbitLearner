<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id','title','author','amount','b_payment_id'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function b_payment()
    {
        return $this->belongsTo(BPayment::class);
    }
}
