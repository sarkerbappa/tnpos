<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokeInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('stoke_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Product_Id');
            $table->text('Product_code');
            $table->integer('Stock_Quantity')->default(1);
            $table->integer('Buy_Price');
            $table->integer('Other_Cost');
            $table->text('Reference');
            $table->integer('ToBe_Sale_Unit_Price');
            $table->integer('Product_VAT_Percentage');
            $table->text('Remarks');
            $table->timestamp('Entry_DateTime');
            $table->text('Shop_Id');
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
        Schema::dropIfExists('stoke_info');
    }
}
