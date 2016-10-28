<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Product_Name');
            $table->text('Product_Description');
            $table->boolean('Serialized_Nonserialized');
            $table->string('Product_Category_Id');
            $table->string('Product_Sub_Category_Id');
            $table->dateTime('Entry_DateTime');
            $table->string('Shop_Id');
            $table->string('Remarks');
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
        Schema::dropIfExists('products_info');
    }
}
