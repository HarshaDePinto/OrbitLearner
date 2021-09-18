<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password','role_id','author', 'image','f_name','l_name','title','school','address','contact','des','des2','b_day','gender','is_active','opt','mobile','is_sadhana','sadhana_reg_number','barcode','parents_name','max_advanced','welfare_teachers'
    ];

    public function s_teachers()
    {
        return $this->hasMany(STeacher::class)->orderBy('updated_at', 'desc');
    }
    public function groups()
    {
        return $this->hasMany(Group::class)->orderBy('updated_at', 'desc');
    }

    public function g_batches()
    {
        return $this->hasMany(GBatch::class)->orderBy('updated_at', 'desc');
    }

    public function b_students()
    {
        return $this->hasMany(BStudent::class)->orderBy('updated_at', 'desc');
    }

    public function b_payments()
    {
        return $this->hasMany(BPayment::class)->orderBy('updated_at', 'desc');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class)->orderBy('updated_at', 'desc');
    }

    public function msgs()
    {
        return $this->hasMany(Msg::class)->orderBy('updated_at', 'desc');
    }
    public function d_logs()
    {
        return $this->hasMany(DLog::class)->orderBy('updated_at', 'desc');
    }

    public function u_accounts()
    {
        return $this->hasMany(UAccount::class)->orderBy('updated_at', 'desc');
    }

    public function b_t_accounts()
    {
        return $this->hasMany(BTAccount::class)->orderBy('updated_at', 'desc');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
