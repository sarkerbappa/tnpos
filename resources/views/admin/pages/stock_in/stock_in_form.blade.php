@extends('admin.layout.table')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ URL::asset('public/admin/dist/js/autocomplete.js') }}"></script>
<link rel="stylesheet" href="{{ asset('public/admin/dist/css/auto_suggetion.css') }}">


<section class="content">
    @if (Session::get('product_add_success_massege'))
    <div class="bs-example col-md-9">
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> {{Session::get('product_add_success_massege')}}
        </div>
    </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box">
                <div class="box-header"><i class="fa fa-plus fa_title fa-5x"></i>
                    <h3 class="box-title">Stock In</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{Form::open(array('route' => 'addProductStockIn', 'files' => true))}}
                <div class="box-body">
                    <div class="row">
                        <br><br>
                        <div class="col-md-8">
                            <div class="row form-group">
                                <div class="col-md-8 col-md-offset-4 ">
                                    <h4 class="stockIn_column_heading"> All [<b class="mandetory_star">*</b>] fields are mandatory.</h4> 
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Product Code <b class="mandetory_star">*</b> :</label></div>
                                <div class="col-md-8" id="product-code-error-dialog"> 
                                    <?php
                                    $entry_time = date("Y-m-d-m-s", time());
                                    ?>
                                    {{Form::hidden('shop_id', $value = "1",  $attributes = array('id'=>'shop_id'))}}
                                    {{Form::hidden('product_id', '',  $attributes = array('id'=>'product_id'))}}
                                    {{Form::hidden('Entry_DateTime', $value = $entry_time,  $attributes = array('id'=>'entry_datetime'))}}
                                    
                                    {{Form::text('product_code', '', $attributes = array('class' => 'form-control',
                                                                                             'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_ " "',
                                                                                             'data-validation-error-msg'=>'Please Enter a Product Code',
                                                                                             'data-validation-error-msg-container'=>'#product-code-error-dialog',
                                                                                             'id' =>'product_code_stock_in_form',
                                                                                             'Placeholder'=>' Search Using Product Code / Product Name'
                                                                                             ))}}
                                    <span class="text-red">{{$errors->first('product_code')}}</span>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Product Name<b class="mandetory_star">*</b> :</label></div>
                                <div class="col-md-8"> 
                                    {{Form::text('product_name', '', $attributes = array('class' => 'form-control','id' =>'product_code_stock_in_name','disabled'))}}
                                    <span class="text-red">{{$errors->first('product_name')}}</span>
                                </div>
                            </div>

                          
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Stock Quantity:</label></div>
                                <div class="col-md-8"> 
                                    {{Form::number('stock_quantity', '', $attributes = array('class' => 'form-control','id'=>'stock_quantity_stockIn'))}}
                                    <span class="text-red">{{$errors->first('stock_quantity')}}</span>
                                </div>
                            </div>
                            
                             <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Buy Price<b class="mandetory_star">*</b> :</label></div>
                                <div class="col-md-8"> 
                                    {{Form::number('buy_price', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('buy_price')}}</span>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Other Cost<b class="mandetory_star">*</b> :</label></div>
                                <div class="col-md-8"> 
                                    {{Form::number('other_cost', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('other_cost')}}</span>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Reference<b class="mandetory_star">*</b> :</label></div>
                                <div class="col-md-8"> 
                                    {{Form::text('referance', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('referance')}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>To be Sale Unit Price<b class="mandetory_star">*</b>  :</label></div>
                                <div class="col-md-8"> 
                                    {{Form::number('to_be_sale_unite_price', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('to_be_sale_unite_price')}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Vat Percentage<b class="mandetory_star">*</b> : </label></div>
                                <div class="col-md-8"> 
                                    {{Form::number('vat_percentage', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('vat_percentage')}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Remarks:</label></div>
                                <div class="col-md-8"> 
                                    {{Form::text('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>
                 

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2">
                                        <?php echo Form::submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                                    </div>
                                </div>
                            </div>

                            {{ Form::close()}}
                        </div>

                        <!--     .................................Right section...................... -->

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="box-title stockIn_column_heading"> Product Description </h4>
                                    <span>
                                        <p id="product_desc_stock_in"> 
                                           Product description  
                                         </p>
                                    </span>

                                </div>
                            </div>
                            
                              <div class="row">
                                  <div class="col-md-12">
                                       <h4 class="box-title stockIn_column_heading">Serialized/Non Serialized</h4>
                                       <h4 id="serialized_value"> </h4>
                                  </div>
                              </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>   <!-- /.row -->
</section><!-- /.content -->

@stop

