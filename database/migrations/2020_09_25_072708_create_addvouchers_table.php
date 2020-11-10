<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddvouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addvouchers', function (Blueprint $table) {
            $table->increments('id');           
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('voucher_id');
            $table->string('voucherTitle');
            $table->string('voucherCode');
            $table->string('quantity');
            $table->boolean('expired')->default(0)->nullable();
            $table->date('expiredDate')->nullable();
            $table->string('is_redeemed')->default(0)->nullable();
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
        Schema::dropIfExists('addvouchers');
    }
}
