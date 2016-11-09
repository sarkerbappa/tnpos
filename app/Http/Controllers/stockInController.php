<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\StockIn;

use Redirect;

use View;

use Validator;

use Illuminate\Support\Facades\Input;


class stockInController extends Controller
{
    public function allStokIn(){
         $data['title']               = 'Stock in Manager';
         $data['all_stockIn_product'] = StockIn::allStockInProduct();
         return view('admin.pages.stock_in.stock_in_manager')->with($data);
    }

        /**
     * 
     * @return type
     */
    public function stockInForm(){
        $data['title']         = 'Stock In Form';
        return view('admin.pages.stock_in.stock_in_form')->with($data);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function stockInDelete($id){
        StockIn::deleteProductStockIn($id);
        return Redirect::to('/allStokIn')->with('success_massege', ' Product Deleted Successfully.');
    }
    /**
     * 
     * @param type $id
     * @return type
     */
    public function stockInEditForm($id){
       $data['title']         = 'Stock Edit Form';
       $data['stock_in_data_for_edit'] = StockIn::editProductStockIn($id);
       return view('admin.pages.stock_in.stock_in_edit_form')->with($data);

    }
    
    
    public function stockInEditSave(){
        echo '<pre>';        print_r(Input::all());     echo '</pre>';
         $validation_rule = array(
            'product_code'           => array('required'),
            'buy_price'              => array('required','integer'),
            'stock_quantity'         => array('integer'),
            'other_cost'             => array('required','integer'),
            'referance'              => array('required'),
            'to_be_sale_unite_price' => array('required','integer'),
            'vat_percentage'         => array('required','integer'),
            'remarks'                => array('max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            return Redirect::to('/stockInEditForm/'.Input::get('product_id'))->withInput()->withErrors($validation);
        } else {
            $product_info = array(
                'Product_Id'               => Input::get('product_id'),
                'Product_code'             => Input::get('product_code'),
                'Stock_Quantity'           => Input::get('stock_quantity'),
                'Buy_Price'                => Input::get('buy_price'),
                'Other_Cost'               => Input::get('other_cost'),
                'Reference'                => Input::get('referance'),
                'ToBe_Sale_Unit_Price'     => Input::get('to_be_sale_unite_price'),
                'Product_VAT_Percentage'   => Input::get('vat_percentage'),
                'Remarks'                  => Input::get('remarks'),
                'Entry_DateTime'           => Input::get('Entry_DateTime'),
                'Shop_Id'                  => Input::get('shop_id'),
            );
        }
        
        // Insert data into database      
            StockIn::editProductSaveStockIn(Input::get('product_id'),$product_info);
            return Redirect::to('/allStokIn')->with('success_massege', ' Product Edited Successfully.');
    }

    /**
     * 
     * @return type
     */
    public function addProductStockIn() {
        $validation_rule = array(
            'product_code'           => array('required'),
            'buy_price'              => array('required','integer'),
            'stock_quantity'         => array('integer'),
            'other_cost'             => array('required','integer'),
            'referance'              => array('required'),
            'to_be_sale_unite_price' => array('required','integer'),
            'vat_percentage'         => array('required','integer'),
            'remarks'                => array('max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            return Redirect::to('/stockInForm')->withInput()->withErrors($validation);
        } else {
            $product_info = array(
                'Product_Id'               => Input::get('product_id'),
                'Product_code'             => Input::get('product_code'),
                'Stock_Quantity'           => Input::get('stock_quantity'),
                'Buy_Price'                => Input::get('buy_price'),
                'Other_Cost'               => Input::get('other_cost'),
                'Reference'                => Input::get('referance'),
                'ToBe_Sale_Unit_Price'     => Input::get('to_be_sale_unite_price'),
                'Product_VAT_Percentage'   => Input::get('vat_percentage'),
                'Remarks'                  => Input::get('remarks'),
                'Entry_DateTime'           => Input::get('Entry_DateTime'),
                'Shop_Id'                  => Input::get('shop_id'),
            );
        }
        
        // Insert data into database      
            StockIn::addProductStockIn($product_info);
            return Redirect::to('/allStokIn')->with('success_massege', ' Product StockedIn Successfully.');
        
        
    }

    /**
     * Auto complete search for Stock in
     */
    public function autocompleteProCode($code){
        $auto_complete_value_code = StockIn::autoCompleteWithCode($code);
        return response()->json($auto_complete_value_code);
    }
    
    /**
     * Auto complete search for Stock in
     */
    public function autocompleteProName($name){
         $auto_complete_value_name = StockIn::autoCompleteWithName($name);
        return response()->json($auto_complete_value_name);
    }
}
