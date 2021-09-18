<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('b_student_id')->index();
            $table->foreign('b_student_id')->references('id')->on('b_students')->onDelete('cascade');
            $table->unsignedBigInteger('b_mcq_id')->index();
            $table->foreign('b_mcq_id')->references('id')->on('b_mcqs')->onDelete('cascade');
            $table->unsignedBigInteger('m_mark_id')->index();
            $table->foreign('m_mark_id')->references('id')->on('m_marks')->onDelete('cascade');
            $table->unsignedBigInteger('m_question_id')->index();
            $table->foreign('m_question_id')->references('id')->on('m_questions')->onDelete('cascade');
            $table->integer('q_number')->nullable();
            $table->integer('q_answer')->nullable();
            $table->integer('s_answer')->nullable();
            $table->integer('result')->nullable();
            $table->integer('q_mark')->nullable();
            $table->integer('s_mark')->nullable();
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
        Schema::dropIfExists('m_results');
    }
}
