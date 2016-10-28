<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use Redirect;

use View;



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
    public function addNewProductTypeForm(){
        $data['title']         = 'Add Product Type';
        return View::make('admin.pages.products.add_product_type_form')->with($data);
    }

    

    /**
  * Add Supplier
  */
    public function allSupplier(){
        $data['title']='All Supplier';
        return View::make('pages.setteings.supplier')->with($data);
    }
    
    
    /**Add category
     * 
     */
    
    public function addCategory(Request $request){


    }
}
