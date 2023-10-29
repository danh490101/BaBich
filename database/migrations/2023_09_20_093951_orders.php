<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('delivery_date')->nullable();
            $table->decimal('totalamount', 10, 3);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->smallInteger('status')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone', 10);
            $table->string('payment_method');
            $table->string('payment_status')->default('Not paid yet');
            $table->text('order_notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
