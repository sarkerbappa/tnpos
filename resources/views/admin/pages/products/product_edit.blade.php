@extends('admin.layout.table')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ URL::asset('public/admin/dist/js/autocomplete.js') }}"></script>
<link rel="stylesheet" href="{{ asset('public/admin/dist/css/auto_suggetion.css') }}">

<section class="content">

    <div class="row">
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="box">
                <div class="box-header"><i class="fa fa-edit  fa-5x"></i>
                    <h3 class="box-title">Product Edit</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{Form::open(array('route' => 'productEditSave', 'files' => true))}}
                 
                <div class="box-body">
                    
                     <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Code <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6" id="product-code-error-dialog"> 
                            <?php 
                            $entry_time = date("Y-m-d-m-s",time());
                            ?>
                            {{Form::text('product_code', $value= $product['product_info']->Product_Code,  $attributes = array(
                                                                     'id'=>'category_select_add_product_page_id_edit',
                                                                     'class' => 'form-control','disabled',
                                                                          ))}}
                            <span class="text-red">{{$errors->first('product_code')}}</span>
                             {{Form::hidden('shop_id', $value = "1",  $attributes = array('id'=>'shop_id'))}}
                             {{Form::hidden('Entry_DateTime', $value = $entry_time,  $attributes = array('id'=>'entry_datetime'))}}
                             {{Form::hidden('id', $value = $product['product_info']->id,  $attributes = array('id'=>'id'))}}
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Name <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6" id="product-name-error-dialog"> 
                            {{Form::text('product_name', $value= $product['product_info']->Product_Name,  $attributes = array('class' => 'form-control', ))}}
                            <span class="text-red">{{$errors->first('product_name')}}</span>
                        </div>
                    </div>
                    
                    <!--................................Product Description ................................-->

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label> Product Description:</label></div>
                        <div class="col-md-6"> 
                            {{ Form::textarea('product_description', $value= $product['product_info']->Product_Description, $attributes = array('class' => 'form-control', 'placeholder' => 'Product Description'))}}
                            <span class="text-red">{{ $errors->first('product_description')}}</span>
                        </div>
                    </div>
                    
                    <!--................................Serialized/Non Serialized................................-->

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label> Serialized/Non Serialized:</label></div>
                        <div class="col-md-6"> 
                            <?php
                            $var1 = false;
                            $var2 = false;
                            if ($product['product_info']->Serialized_Nonserialized === 1) {
                                $var1 = true;
                            } else {
                                $var2 = true;
                            }
                            ?>
                            <div class="form-group">
                                {{Form::radio('serialized', 1, $var1, array('class' => 'minimal-red'))}}
                                Serialized
                                {{Form::radio('serialized',0,$var2, array('class' => 'minimal-red'))}}
                                Non Serialized  
                            </div>
                            <span class="text-red">{{$errors->first('srialized')}}</span>
                        </div>
                    </div>

                    <!--....... ........................... Product category .................................-->
                    
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Category <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6"> 
                            {{Form::text('category_name', $value = $product['category']->Product_Category_Name,  $attributes = array(
                                                                       'class' => 'form-control',
                                                                       'id'=>'category_select_add_product_page_edit'
                                                                                   ))}}
                            {{Form::hidden('category_id', $value= $product['category']->id,  $attributes = array(
                                                                     'id'=>'category_select_add_product_page_id_edit'
                                                                          ))}}

                            <span class="text-red">{{$errors->first('category_name')}}</span>
                        </div>

                    </div>
                    <!--....... ........................... Product Sub category .................................-->


                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Sub Category <b class="mandetory_star">*</b> :</label></div>

                          <div class="col-md-6" id="product-sub-category-error-dialog"> 
                            {{Form::text('sub_category_name', $value = $product['sub_category']->Product_Sub_Category_Name,  $attributes = array(
                                                                   'class' => 'form-control',
                                                                       'id'=>'sub_category_select_add_product_page_edit'
                                                                                   ))}}
                             
                            {{Form::hidden('sub_category_id', $value= $product['sub_category']->id,  $attributes = array(
                                                                     'id'=>'category_select_add_product_page_id_edit'
                                                                          ))}}

                            <span class="text-red">{{$errors->first('category_name')}}</span>
                        </div>
                       
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Remarks:</label></div>
                        <div class="col-md-6" id="product-name-error-dialog"> 
                            {{Form::text('remarks', $value= $product['product_info']->Remarks, $attributes = array('class' => 'form-control'))}}
                            <span class="text-red">{{$errors->first('remarks')}}</span>
                        </div>
                    </div>
                  

                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <?php echo Form::submit('Submit', array('class' => 'btn btn-primary btn-block btn-flat inside_body_submit')) ?>
                        </div>
                    </div>
                </div>
               
                {{ Form::close()}}
            </div><!-- /.box -->

        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

@stop

