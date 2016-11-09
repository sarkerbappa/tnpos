<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id              = $request->category_id;
        $sub_category_name        = $request->sub_category_name;
        $sub_category_entry_date  = $request->sub_category_entry_date;
        $sub_category_info = array(
                'Category_Id'                  => $category_id,
                'Product_Sub_Category_Name'    => $sub_category_name,
                'Entry_DateTime'               => $sub_category_entry_date,
                'Shop_Id'                      => 1
                );
            // Insert data into database      
       $respons =  Product::createProductSubCategory($sub_category_info);
       return $respons;  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Auto complete Sub category
     * @param type $id
     * @param type $value
     * @return type
     */
    public function autocompleteSubCat($id,$value){
        $data = Product::autocompletSubCat($id,$value);
        return response($data);
    }
}
