<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_tutorials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id')->index();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->unsignedBigInteger('g_batch_id')->index();
            $table->foreign('g_batch_id')->references('id')->on('g_batches')->onDelete('cascade');
            $table->unsignedBigInteger('g_tutorial_id')->index();
            $table->foreign('g_tutorial_id')->references('id')->on('g_tutorials')->onDelete('cascade');
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
        Schema::dropIfExists('b_tutorials');
    }
}
