<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUAEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_a_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_account_id')->index();
            $table->foreign('u_account_id')->references('id')->on('u_accounts')->onDelete('cascade');
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
        Schema::dropIfExists('u_a_entries');
    }
}
