<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'm_img', 'm_t1', 'm_t2','a_t1','a_des1', 'a_des2','a_img1','au_name','au_img','au_sig','c_img','t_img','cl_img','g_img','v_img','v_tit','v_link','ab_t1','ab_t2','ab_des1','ab_img','author'
    ];
}
