<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\StockIn;

use Redirect;

use View;

use Validator;



use Illuminate\Support\Facades\Input;


class stockInFormController extends Controller
{
    public function allStokIn(){
         $data['title']         = 'Stock in Manager';
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
   
}
