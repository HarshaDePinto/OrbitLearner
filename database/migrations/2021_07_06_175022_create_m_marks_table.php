<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('b_student_id')->index();
            $table->foreign('b_student_id')->references('id')->on('b_students')->onDelete('cascade');
            $table->unsignedBigInteger('b_mcq_id')->index();
            $table->foreign('b_mcq_id')->references('id')->on('b_mcqs')->onDelete('cascade');
            $table->integer('paper_mark')->nullable();
            $table->integer('student_mark')->nullable();
            $table->integer('average')->nullable();
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
        Schema::dropIfExists('m_marks');
    }
}
