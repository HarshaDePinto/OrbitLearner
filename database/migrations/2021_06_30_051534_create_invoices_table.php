<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('author')->nullable();
            $table->integer('status')->default(0);
            $table->integer('method')->default(0);
            $table->string('currency')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_expiry')->nullable();
            $table->integer('payment_status')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('md5sig')->nullable();
            $table->string('payment_method')->nullable();
            
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
        Schema::dropIfExists('invoices');
    }
}
