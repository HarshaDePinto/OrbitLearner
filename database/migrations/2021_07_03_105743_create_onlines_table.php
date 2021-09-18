<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('g_batch_id')->index();
            $table->foreign('g_batch_id')->references('id')->on('g_batches')->onDelete('cascade');
            $table->string('author')->nullable();
            $table->integer('status')->default(0);
            $table->string('topic')->nullable();
            $table->string('agenda')->nullable();
            $table->string('meeting_type')->nullable();
            $table->string('meeting_id')->nullable();
            $table->string('meeting_password')->nullable();
            $table->string('assistant_id')->nullable();
            $table->string('host_id')->nullable();
            $table->string('join_url')->nullable();
            $table->string('start_time')->nullable();
            $table->string('start_url')->nullable();
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
        Schema::dropIfExists('onlines');
    }
}
