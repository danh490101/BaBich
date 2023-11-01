<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warehouse_detail', function (Blueprint $table) {
            //
            $table->bigInteger('warehouse_receipt_id')->unsigned();
            $table->foreign('warehouse_receipt_id')->references('id')->on('warehouse_receipt')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warehouse_detail', function (Blueprint $table) {
            //
            
        });
    }
};
