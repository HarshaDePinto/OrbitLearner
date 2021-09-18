<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBIAEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_i_a_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('b_i_account_id')->index();
            $table->foreign('b_i_account_id')->references('id')->on('b_i_accounts')->onDelete('cascade');
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
        Schema::dropIfExists('b_i_a_entries');
    }
}
