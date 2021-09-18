<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBSAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_s_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('b_student_id')->index();
            $table->foreign('b_student_id')->references('id')->on('b_students')->onDelete('cascade');
            $table->string('des')->nullable();
            $table->integer('in')->nullable();
            $table->integer('out')->nullable();
            $table->integer('bal')->nullable();
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
        Schema::dropIfExists('b_s_accounts');
    }
}
