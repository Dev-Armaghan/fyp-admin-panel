<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->integer('purchase_id');
            $table->integer('product_id');
            $table->integer('qty');
            $table->double('price');
            $table->double('unit_price');
            $table->date('expiry_date');
            $table->integer('batch_no');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->foreign('product_id')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
