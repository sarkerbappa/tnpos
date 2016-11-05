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
                {{Form::open(array('route' => 'addProduct', 'files' => true))}}
                <div class="box-body">
                    <div class="row">
                        <br><br>
                        <div class="col-md-8">
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Product Code <b class="mandetory_star">*</b> :</label></div>
                                <div class="col-md-8" id="product-code-error-dialog"> 
                                    <?php
                                    $code = date("Ymdms", time());
                                    $entry_time = date("Y-m-d-m-s", time());
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
                                <div class="col-md-4 form-level"><label>Product Name:</label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
                                    {{Form::text('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>

                          
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Stock Quantity:</label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
                                    {{Form::number('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>
                            
                             <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Buy Price:</label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
                                    {{Form::number('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Other Cost:</label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
                                    {{Form::number('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Reference:</label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
                                    {{Form::text('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>To be Sale Unit Price :</label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
                                    {{Form::number('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Vat Percentage: </label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
                                    {{Form::number('remarks', '', $attributes = array('class' => 'form-control'))}}
                                    <span class="text-red">{{$errors->first('remarks')}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4 form-level"><label>Remarks:</label></div>
                                <div class="col-md-8" id="product-name-error-dialog"> 
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
                                    <h3 class="box-title"> Product Description</h3><hr>
                                    <span>
                                        <p style="text-align:justify; padding:0px 20px 10px 10px;"> 
                                            What is Lorem Ipsum?
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            , when an unknown printer took a galley of type and scrambled it to make a 
                                 
                                           </p>
                                    </span>

                                </div>
                            </div>
                            
                              <div class="row">
                                  <div class="col-md-12">
                                       <h3 class="box-title">Serialized/Non Serialized</h3><hr>
                                       <h4><input type="checkbox" name="your-group" value="" checked="true" />  Serialized</h4> 
                                       <h4><input type="checkbox" name="your-group" value="unit-in-group" />  Non Serialized</h4>
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

