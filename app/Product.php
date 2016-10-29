<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    
    static function getAllProducts(){
       $all_products = DB::table('products_info')->get();
       return $all_products;
    }
    
    /**
     * Add Product Category
     */
    
   
    static function CreateProductCategory($category_info){
        DB::table('product_category_info')->insert($category_info);
       return response()->json(['success_massege'=>'Category Added Successfully']);
    }
    
}
