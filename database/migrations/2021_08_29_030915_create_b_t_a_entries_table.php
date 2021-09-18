<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBTAEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_t_a_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('b_t_account_id')->index();
            $table->foreign('b_t_account_id')->references('id')->on('b_t_accounts')->onDelete('cascade');
            $table->integer('type')->default(0);
            $table->string('des')->nullable();
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('b_t_a_entries');
    }
}
