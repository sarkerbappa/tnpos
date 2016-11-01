@extends('admin.layout.table')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<section class="content">
 <script>
  $( function() {
    $( "#project" ).autocomplete({
      minLength: 0,
      source: function (request, response) {
                $.ajax({
                    type: 'GET',
                    url: 'api/autocomplete/'+request.term,
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {
                                label:item.Product_Category_Name ,
                                id: item.id,
                            };
                        }));
                    },
                });
            },
            
      focus: function( event, ui ) {
        $( "#project" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#project" ).val( ui.item.label );
        $( "#project-id" ).val( ui.item.id );
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label + "</div>" )
        .appendTo( ul );
    };
  } );
  </script>
  
  
  
  
    @if (Session::get('category_added_success_massege'))
    <div class="bs-example col-md-9">
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> {{Session::get('category_added_success_massege')}}
        </div>
    </div>
    @endif
    

    <div class="row">
        <!--<div class="col-md-1"></div>-->
        <!-- left column -->
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="box">
                <div class="box-header"><i class="fa fa-plus fa_title fa-5x"></i>
                    <h3 class="box-title">Add Product Type</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{Form::open(array('route' => 'addProductType', 'files' => true))}}
                <div class="box-body">
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Name <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6" id="product-name-error-dialog"> 
                            {{Form::text('product_name', '', $attributes = array('class' => 'form-control',
                                                                                             'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_',
                                                                                             'data-validation-error-msg'=>'Please Enter a Product Name',
                                                                                             'data-validation-error-msg-container'=>'#product-name-error-dialog'
                                                                                             ))}}
                            <span class="text-red">{{$errors->first('product_name')}}</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label> Product Description:</label></div>
                        <div class="col-md-6"> 
                            {{ Form::textarea('product_description', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Product Description'))}}
                            <span class="text-red">{{ $errors->first('product_description')}}</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label> Serialized/Non Serialized:</label></div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                                {{Form::radio('Serialized', 1, '', array('class' => 'minimal-red'))}}
                                Serialized
                                {{Form::radio('Serialized',0,'', array('class' => 'minimal-red'))}}
                                Non Serialized  
                            </div>
                            <span class="text-red">{{$errors->first('book_sub_auth')}}</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Category <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="project">
                            <input class="form-control" type="hidden" id="project-id">
                        </div>
                        
                        
                        
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCategory">
                                Add Category
                            </button>
                        </div>
                    </div>
                    
                    
                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Product Sub Category <b class="mandetory_star">*</b> :</label></div>
                        <div class="col-sm-6">
                            {{Form::select('book_supplier',array('L' => 'Large', 'S' => 'Small') , '', $attributes = array('class' => 'form-control'))}}
                            <span class="text-red"></span>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSubCategory">
                                Add Sub Category
                            </button>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3 form-level"><label>Entry Date<b class="mandetory_star">*</b> :</label></div>
                        <div class="col-md-6"> 
                            {!! Form::text('entry_date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Product Entry Date', 'id' => 'calendar')) !!}
                            <span class="text-red">{{$errors->first('entry_date')}}</span>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                
                
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

            
           
            

            <!--  ++++++++++++++++++++++++++++++++ Add Category  Modal+++++++++++++++++++++++++++++++++++++ -->

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
                                        <div class="col-md-3 form-level"></div>
                                        <div class="col-md-9" id="success_massege"> </div>
                                    </div>
                                   
                                    <div class="row form-group">
                                        <div class="col-md-3 form-level"><label>Category Name<b class="mandetory_star">*</b></label></div>
                                        <div class="col-md-9" id="email-error-dialog"> 
                                            {{Form::text('category_name','', $attributes = array('class' => 'form-control',
                                                                                                 'id' => 'category_name_id',
                                                                                                 'data-validation'=>'alphanumeric', 'data-validation-allowing'=>'-_',
                                                                                                 'data-validation-error-msg'=>'Please Enter a Valid Category Name',
                                                                                                 'data-validation-error-msg-container'=>'#email-error-dialog',
                                                                                             ))}}
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-3 form-level"><label>Entry Date<b class="mandetory_star">*</b></label></div>
                                        <div class="col-md-9" id="date-error-dialog"> 
                                            {{Form::date('entry_date','', $attributes = array('class' => 'form-control',
                                                                                              'id' => 'category_entry_date_id',
                                                                                              'data-validation'=>'date',
                                                                                              'data-validation-error-msg'=>'Please Enter a Valid Date',
                                                                                              'data-validation-error-msg-container'=>'#date-error-dialog'))}}
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


            
            
     
            
            <!--  ++++++++++++++++++++++++++++++++ Add Subcategory +++++++++++++++++++++++++++++++++++++ -->

            <div class="modal fade" id="addSubCategory" tabindex="-1" role="dialog" aria-labelledby="addSubCategoryLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addSubCategoryLabel">Add Sub Category</h4>
                        </div>

                        {{Form::open(array('route' => 'addNewProductTypeForm')) }}
                        <div class="modal-body">

                            <div class="box-body">

                                <div class="row form-group">
                                    <div class="col-md-3 form-level"><label>Category Name<b class="mandetory_star">*</b></label></div>
                                    <div class="col-md-9"> 
                                        {{Form::select('book_supplier',array('L' => 'Large', 'S' => 'Small') , '', $attributes = array('class' => 'form-control'))}}
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-3 form-level"><label>Sub Category Name<b class="mandetory_star">*</b></label></div>
                                    <div class="col-md-9"> 
                                        {{Form::text('category_name','', $attributes = array('class' => 'form-control'))}}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3 form-level"><label>Entry Date<b class="mandetory_star">*</b></label></div>
                                    <div class="col-md-9"> 
                                        {{Form::date('entry_date', $value = '', $attributes = array('class' => 'form-control'))}}
                                    </div>
                                </div>

                            </div><!-- /.box-body -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="tag-form-submit" type="button" class="btn btn-primary">Save </button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

@stop

