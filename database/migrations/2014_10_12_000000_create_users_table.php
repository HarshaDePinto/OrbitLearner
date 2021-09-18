<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->integer('is_active')->default(0);
            $table->integer('gender');
            $table->integer('mobile');
            $table->string('opt')->nullable();
            $table->string('user_name')->unique();
            $table->string('author')->nullable();
            $table->string('image')->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('title')->nullable();
            $table->string('b_day')->nullable();
            $table->string('school')->nullable();
            $table->text('address')->nullable();
            $table->text('contact')->nullable();
            $table->text('des')->nullable();
            $table->text('des2')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_sadhana')->default(0);
            $table->string('sadhana_reg_number')->nullable();
            $table->string('barcode')->nullable();
            $table->string('parents_name')->nullable();
            $table->integer('max_advanced')->default(0);
            $table->integer('welfare_teachers')->default(0);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
