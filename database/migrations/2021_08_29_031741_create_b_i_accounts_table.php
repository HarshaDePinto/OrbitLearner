<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBIAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_i_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('g_batch_id')->index();
            $table->foreign('g_batch_id')->references('id')->on('g_batches')->onDelete('cascade');
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
        Schema::dropIfExists('b_i_accounts');
    }
}
