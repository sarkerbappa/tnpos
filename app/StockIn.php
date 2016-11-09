<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StockIn extends Model {
/**
 * 
 * @param type $name
 * @return type
 */
    static function autoCompleteWithName($name){
        $auto_complete_result = DB::table('products_info')
                ->select('id', 'Product_Code','Product_Name','Product_Description','Serialized_Nonserialized')
                ->where('Product_Name', 'like', '%' . $name . '%')
                ->get();
        return $auto_complete_result;
    }
    /**
     * 
     * @param type $code
     * @return type
     */
     static function autoCompleteWithCode($code){
        $auto_complete_result = DB::table('products_info')
                ->select('id', 'Product_Code','Product_Name','Product_Description','Serialized_Nonserialized')
                ->where('Product_Code', 'like', '%' .$code . '%')
                ->get();
        return $auto_complete_result;
    }
    /**
     * 
     * @param type $product_info
     */
    static function addProductStockIn($product_info){
         DB::table('stoke_info')->insert($product_info);
    }
    /**
     * 
     * @return type
     */
    static function allStockInProduct(){
        $all_products = DB::table('stoke_info')->get();
        return $all_products;
    }
    
    static function editProductSaveStockIn($id,$product_info){
        DB::table('stoke_info')
            ->where('id', $id)
            ->update($product_info);  
    }

     /**
     * 
     * @param type $id
     */
    static function deleteProductStockIn($id){
        DB::table('stoke_info')->where('id', '=', $id)->delete();
    }
    
    static function editProductStockIn($id){
        $data['product_info_from_stok'] = DB::table('stoke_info')
                ->where('id','=',$id)
                -> first();
        $data['product_info_from_product_table'] = DB::table('products_info')
                ->select('Product_Name','Product_Description','Serialized_Nonserialized')
                ->where('id','=',$data['product_info_from_stok']->Product_Id)
                ->first();
        return $data;
    }

}
