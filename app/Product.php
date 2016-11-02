<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model {

    /**
     * 
     * @return type
     */
    static function getAllProducts() {
        $all_products = DB::table('products_info')->get();
        return $all_products;
    }

    /**
     * 
     * @param type $query
     * @return type
     */
    static function autocomplet($query) {
        $auto_complete_result = DB::table('product_category_info')
                ->select('id', 'Product_Category_Name')
                ->where('Product_Category_Name', 'like', '%' . $query . '%')
                ->get();
        return $auto_complete_result;
    }

    /**
     * 
     * @param type $category_info
     * @return type
     */
    static function createProductCategory($category_info) {
        DB::table('product_category_info')->insert($category_info);
        return response()->json(['success_massege' => 'Category Added Successfully']);
    }

    /**
     * 
     * @param type $sub_category_info
     * @return type
     */
    static function createProductSubCategory($sub_category_info) {
        DB::table('product_sub_category_info')->insert($sub_category_info);
        return response()->json(['success_massege' => 'SubCategory Added Successfully']);
    }

}
