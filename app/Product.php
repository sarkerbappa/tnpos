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
    
    static function create(){
        DB::table('product_category_info')->insert($book_info);
    }
    
}
