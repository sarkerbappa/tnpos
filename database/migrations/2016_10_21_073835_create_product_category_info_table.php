<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Product_Category_Name');
            $table->timestamp('Entry_DateTime');
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
        Schema::dropIfExists('product_category_info');
    }
}
