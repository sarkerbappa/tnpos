@extends('admin.layout.table')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header"><i class="fa fa-product-hunt fa-2x"></i>
                    <h3 class="box-title"> All Product Types</h3>
                    <span class="pull-right">
                        <a href="{{URL::route("addNewProductTypeForm")}}"  class="btn  btn-default btn-flat">Add New Type</a>
                        <button class="btn  btn-default btn-flat"> Import XL</button> 
                        <button class="btn  btn-default btn-flat"> Export XL</button>  
                    </span>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Entry_DateTime</th>
                                <th>Remarks</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_products as $single_product)
                        <td>{{$single_product->Product_Name}}</td>
                        <td>{{$single_product->Product_Description}}</td>
                        <td>{{$single_product->Entry_DateTime}}</td>
                        <td>{{$single_product->Remarks}}</td>
                        <td>
                            <span>
                                <a href="#" class="btn  btn-default btn-flat btn-info">Edit</a>
                                <a href="#" onclick="return confirm('Are you sure you want to delete this item?');" class="btn  btn-default btn-flat btn-danger">Delete</a> 
                            </span>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Entry_DateTime</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@stop