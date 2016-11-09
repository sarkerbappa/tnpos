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
     * @param type $product_info
     */
    static function addProduct($product_info){
        DB::table('products_info')->insert($product_info);
    }
    
    static function EditProduct($product_info,$id){
       DB::table('products_info')
            ->where('id', $id)
            ->update([
                'Product_Name' => $product_info['Product_Name'],
                'Product_Description' => $product_info['Product_Description'],
                'Serialized_Nonserialized' =>$product_info['Serialized_Nonserialized'],
                'Product_Category_Id' => $product_info['Product_Category_Id'],
                'Product_Sub_Category_Id' => $product_info['Product_Sub_Category_Id'],
                'Entry_DateTime' => $product_info['Entry_DateTime'],
                'Remarks' => $product_info['Remarks'],
                ]);  
    }

    

    static function getProductForEdit($id){
        $edit_info['product_info']      = DB::table('products_info')->where('id', $id)->first();
        $edit_info['category']     = DB::table('product_category_info')->select('id', 'Product_Category_Name')->where('id', $edit_info['product_info']->Product_Category_Id)->first();
        $edit_info['sub_category'] = DB::table('product_sub_category_info')->select('id','Product_Sub_Category_Name')->where('id', $edit_info['product_info']->Product_Sub_Category_Id)->first();
        return $edit_info;
    }

        /**
     * 
     * @param type $id\
     */
    static function deleteProduct($id){
        DB::table('products_info')->where('id', '=', $id)->delete();
    }

    /**
     * Category Autocomplete
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
     * Sub Category Autocomplete
     * @param type $id
     * @param type $query
     * @return type
     */
    static function autocompletSubCat($id,$query){
        $auto_complete_result = DB::table('product_sub_category_info')
                ->select('id', 'Product_Sub_Category_Name')
                ->where('Category_Id', '=', $id )
                ->where('Product_Sub_Category_Name', 'like', '%' . $query . '%')
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
