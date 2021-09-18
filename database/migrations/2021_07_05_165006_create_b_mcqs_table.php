<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBMcqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_mcqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id')->index();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->unsignedBigInteger('g_batch_id')->index();
            $table->foreign('g_batch_id')->references('id')->on('g_batches')->onDelete('cascade');
            $table->unsignedBigInteger('g_mcq_id')->index();
            $table->foreign('g_mcq_id')->references('id')->on('g_mcqs')->onDelete('cascade');
            $table->integer('is_active')->default(0);
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
        Schema::dropIfExists('b_mcqs');
    }
}
