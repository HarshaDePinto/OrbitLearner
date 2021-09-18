<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('g_mcq_id')->index();
            $table->foreign('g_mcq_id')->references('id')->on('g_mcqs')->onDelete('cascade');
            $table->integer('number')->nullable();
            $table->integer('marks')->nullable();
            $table->integer('ans')->nullable();
            $table->string('q_img')->nullable();
            $table->string('s_img')->nullable();
            $table->string('s_audio')->nullable();
            $table->string('s_vid')->nullable();
            $table->text('s_des')->nullable();
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
        Schema::dropIfExists('m_questions');
    }
}
