<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('m_img')->nullable();
            $table->string('m_t1')->nullable();
            $table->string('m_t2')->nullable();
            $table->string('a_t1')->nullable();
            $table->text('a_des1')->nullable();
            $table->text('a_des2')->nullable();
            $table->string('a_img1')->nullable();
            $table->string('au_name')->nullable();
            $table->string('au_img')->nullable();
            $table->string('au_sig')->nullable();
            $table->string('c_img')->nullable();
            $table->string('t_img')->nullable();
            $table->string('cl_img')->nullable();
            $table->string('g_img')->nullable();
            $table->string('v_img')->nullable();
            $table->string('v_tit')->nullable();
            $table->string('v_link')->nullable();
            $table->string('ab_t1')->nullable();
            $table->string('ab_t2')->nullable();
            $table->text('ab_des1')->nullable();
            $table->string('ab_img')->nullable();
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
