<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubCategoryInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_category_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Category_Id');
            $table->string('Product_Sub_Category_Name');
            $table->dateTime('Entry_DateTime');
            $table->string('Shop_Id');
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
        Schema::dropIfExists('product_sub_category_info');
    }
}
