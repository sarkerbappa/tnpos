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
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="box">
                <div class="box-header"><i class="fa fa-plus fa_title fa-5x"></i>
                    <h3 class="box-title">Add Product Type</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{Form::open(array('route' => 'addProduct', 'files' => true))}}
                <div class="box-body">
                    
                     <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Code <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6" id="product-code-error-dialog"> 
                            <?php 
                            $code = date("Ymdms",time());
                            $entry_time = date("Y-m-d-m-s",time());
                            ?>
                            {{Form::text('product_code', $value= $code, $attributes = array('class' => 'form-control',
                                                                                             'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_ " "',
                                                                                             'data-validation-error-msg'=>'Please Enter a Product Code',
                                                                                             'data-validation-error-msg-container'=>'#product-code-error-dialog'
                                                                                             ))}}
                            <span class="text-red">{{$errors->first('product_code')}}</span>
                             {{Form::hidden('shop_id', $value = "1",  $attributes = array('id'=>'shop_id'))}}
                             {{Form::hidden('Entry_DateTime', $value = $entry_time,  $attributes = array('id'=>'entry_datetime'))}}
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Name <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6" id="product-name-error-dialog"> 
                            {{Form::text('product_name', '', $attributes = array('class' => 'form-control',
                                                                                             'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_ " "',
                                                                                             'data-validation-error-msg'=>'Please Enter a Product Name',
                                                                                             'data-validation-error-msg-container'=>'#product-name-error-dialog'
                                                                                             ))}}
                            <span class="text-red">{{$errors->first('product_name')}}</span>
                        </div>
                    </div>
                    
                    <!--................................Product Description ................................-->

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label> Product Description:</label></div>
                        <div class="col-md-6"> 
                            {{ Form::textarea('product_description', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Product Description'))}}
                            <span class="text-red">{{ $errors->first('product_description')}}</span>
                        </div>
                    </div>
                    
                    <!--................................Serialized/Non Serialized................................-->

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label> Serialized/Non Serialized:</label></div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                {{Form::radio('Serialized', 1, true, array('class' => 'minimal-red'))}}
                                Serialized
                                {{Form::radio('Serialized',0,'', array('class' => 'minimal-red'))}}
                                Non Serialized  
                            </div>
                            <span class="text-red">{{$errors->first('Serialized')}}</span>
                        </div>
                    </div>

                    <!--....... ........................... Product category .................................-->
                    
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Category <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6" id="product-category-error-dialog"> 
                            {{Form::text('category_name', '',  $attributes = array(
                                                                   'class' => 'form-control',
                                                          'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_ " "',
                                                'data-validation-error-msg'=>'Please Enter a Category Name',
                                      'data-validation-error-msg-container'=>'#product-category-error-dialog',
                                                                        'id'=>'category_select_add_product_page'
                                                                                   ))}}
                            {{Form::hidden('category_id', '',  $attributes = array(
                                                                     'id'=>'category_select_add_product_page-id'
                                                                          ))}}

                            <span class="text-red">{{$errors->first('category_name')}}</span>
                        </div>

                        <div class="col-sm-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCategory">
                                Add Category
                            </button>
                        </div>
                    </div>

                    <!--....... ........................... Product Sub category .................................-->


                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Sub Category <b class="mandetory_star">*</b> :</label></div>

                          <div class="col-md-6" id="product-sub-category-error-dialog"> 
                            {{Form::text('sub_category_name', '',  $attributes = array(
                                                                   'class' => 'form-control',
                                                          'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_ " "',
                                                'data-validation-error-msg'=>'Please Enter a Sub Category Name',
                                      'data-validation-error-msg-container'=>'#product-sub-category-error-dialog',
                                                                       'id'=>'sub_category_select_add_product_page'
                                                                                   ))}}
                             
                            {{Form::hidden('sub_category_id', '',  $attributes = array(
                                                                     'id'=>'category_select_add_product_page_id'
                                                                          ))}}

                            <span class="text-red">{{$errors->first('category_name')}}</span>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSubCategory">
                                Add Sub Category
                            </button>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Remarks:</label></div>
                        <div class="col-md-6" id="product-name-error-dialog"> 
                            {{Form::text('remarks', '', $attributes = array('class' => 'form-control'))}}
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


            <!--++++++++++++++++++++++++++++++++ Add Category  Modal+++++++++++++++++++++++++++++++++++++ -->


            <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addCategoryLabel">Add Category</h4>
                        </div>

                        <form action="{{ route('product_category.store') }}" method="POST">
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="box-body">
                                        <div class="row form-group">
                                            <div class="col-md-9 col-md-offset-3" id="success_massege_cat"> </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-3 form-level"><label>Category Name<b class="mandetory_star">*</b></label></div>
                                            <div class="col-md-9" id="email-error-dialog"> 
                                                {{Form::text('category_name','', $attributes = array('class' => 'form-control',
                                                                                                 'id' => 'category_name_id',
                                                                                                 'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_" " ',
                                                                                                 'data-validation-error-msg'=>'Please Enter a Valid Category Name',
                                                                                                 'data-validation-error-msg-container'=>'#email-error-dialog',
                                                                                                 'data-validation-help'=>'Please Enter Alpha Numeric value. NB: dont use any operator sign'
                                                                                             ))}}
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="category_submit" type="submit" class="btn btn-primary save-category"> Save category </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!--  ++++++++++++++++++++++++++++++++ Add Sub Category +++++++++++++++++++++++++++++++++++++ -->


            <div class="modal fade" id="addSubCategory" tabindex="-1" role="dialog" aria-labelledby="addSubCategoryLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addSubCategoryLabel">Add Sub Category</h4>
                        </div>

                        <form action="{{ route('product_sub_category.store') }}" method="POST">
                            <div class="modal-body">

                                <div class="box-body">
                                    <div class="row form-group">
                                        <div class="col-md-9 col-md-offset-3" id="success_massege_sub_cat"> </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-3 form-level"><label>Category Name<b class="mandetory_star">*</b></label></div>
                                        <div class="col-md-9" id="product-category-modal-error-dialog"> 
                                            {{Form::text('category_name', '',  $attributes = array(
                                                                   'class' => 'form-control',
                                                          'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_ " "',
                                                'data-validation-error-msg'=>'Type initial character of category name',
                                      'data-validation-error-msg-container'=>'#product-category-modal-error-dialog',
                                                                       'id'=>'select_category'
                                                                                   ))}}
                                            {{Form::hidden('category_id', '',  $attributes = array(
                                                                     'id'=>'category_id'
                                                                          ))}}
                                          
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-3 form-level"><label>Sub Category Name<b class="mandetory_star">*</b></label></div>
                                        <div class="col-md-9" id="email-error-dialog-subcategory"> 
                                            {{Form::text('sub_category_name','', $attributes = array('class' => 'form-control',
                                                                                                 'id' => 'sub_category_name_id',
                                                                                                 'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_" " ',
                                                                                                 'data-validation-error-msg'=>'Please Enter a Valid Sub Category Name',
                                                                                                 'data-validation-error-msg-container'=>'#email-error-dialog-subcategory',
                                                                                                 'data-validation-help'=>'Please Enter Alpha Numeric value. NB: dont use any operator sign'
                                                                                             ))}}
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="sub_category_submit" type="submit" class="btn btn-primary save-category"> Save Sub Category </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

@stop

