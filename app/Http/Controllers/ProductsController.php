<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use Redirect;

use View;

use Validator;



use Illuminate\Support\Facades\Input;


class ProductsController extends Controller
{
 
    /**
  * Add Product
  */
    public function allProductType(){
        $data['title']         = 'Add Category';
        $data['all_products']  = Product::getAllProducts();
        return View::make('admin.pages.products.all_products')->with($data);
    }
    
    /**
     * 
     */
    public function productEditForm($id){
        $data['title']         = 'Product Edit';
        $data['product']  = Product::getProductForEdit($id);
        return View::make('admin.pages.products.product_edit')->with($data);
    }
    
    /**
     * Save Edited Product value
     */
    public function productEditSave(){

          $validation_rule = array(
            'product_name'        => array('required'),
            'serialized'          => array('required'),
            'category_id'         => array('required'),
            'sub_category_id'     => array('required'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if($validation->fails()){
      
            return Redirect::to('/productEditForm/'.Input::get('id'))->withInput()->withErrors($validation);
        } else {
            $product_info = array(
                'Product_Name' => Input::get('product_name'),
                'Product_Description' => Input::get('product_description'),
                'Serialized_Nonserialized' => Input::get('serialized'),
                'Product_Category_Id' => Input::get('category_id'),
                'Product_Sub_Category_Id' => Input::get('sub_category_id'),
                'Entry_DateTime' => Input::get('Entry_DateTime'),
                'Remarks'        =>  Input::get('remarks'),
            );
            
            // Insert data into database      
            Product::EditProduct($product_info,Input::get('id'));
            return Redirect::to('/allProductType')->with('success_massege', ' Product Edited Successfully.');
        }
    }

    

    /**
     * 
     */
    public function productDelete($id){
       Product::deleteProduct($id);
       return Redirect::to('/allProductType')->with('success_massege', 'Product Deleted Successfully.');
    }

    /**
     * 
     */
    public function addNewProductTypeForm(){
        $data['title']         = 'Add Product Type';
        return View::make('admin.pages.products.add_product_type_form')->with($data);
    }

    
    public function addProduct(){

        $validation_rule = array(
            'product_code'        => array('required'),
            'product_name'        => array('required'),
            'product_description' => array(''),
            'Serialized'          => array('required'),
            'category_id'         => array('required'),
            'sub_category_id'     => array('required'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if($validation->fails()){
            return Redirect::to('/addNewProductTypeForm')->withInput()->withErrors($validation);
        } else {
            $product_info = array(
                'Product_Code' => Input::get('product_code'),
                'Product_Name' => Input::get('product_name'),
                'Product_Description' => Input::get('product_description'),
                'Serialized_Nonserialized' => Input::get('Serialized'),
                'Product_Category_Id' => Input::get('category_id'),
                'Product_Sub_Category_Id' => Input::get('sub_category_id'),
                'Shop_Id' => Input::get('shop_id'),
                'Entry_DateTime' => Input::get('entry_time'),
                'Remarks'        =>  Input::get('remarks'),
            );
            // Insert data into database      
            Product::addProduct($product_info);
            return Redirect::to('/allProductType')->with('success_massege', 'New Product Type Added Successfully.');
        }
    }

    
    /**
  * Add Supplier
  */
    public function allSupplier(){
        $data['title']='All Supplier';
        return View::make('pages.setteings.supplier')->with($data);
    }
    
}
