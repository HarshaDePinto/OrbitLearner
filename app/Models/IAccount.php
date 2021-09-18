<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','author','des','in','out','bal'
    ];

    public function i_a_entries()
    {
        return $this->hasMany(IAEntry::class)->orderBy('updated_at', 'desc');
    }
}
