@extends('admin.layout.table')
@section('content')
<script>
   
</script>

<section class="content">
    @if (Session::get('success_massege'))
    <div class="bs-example col-md-9">
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> {{Session::get('success_massege')}}
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header"><i class="fa fa-product-hunt fa-2x"></i>
                    <h3 class="box-title"> All Product</h3>
                    <span class="pull-right">
                        <a href="{{URL::route("stockInForm")}}"  class="btn  btn-default ">Add New </a>
                        <button class="btn  btn-default"> Import XL</button> 
                        <button class="btn  btn-default"> Export XL</button>  
                    </span>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Quantity</th>
                                <th>Seal Price</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @foreach ($all_stockIn_product as $single_product)
                       <tr>
                        <td>{{$single_product->Product_code}}</td>
                        <td>{{$single_product->Stock_Quantity}}</td>
                        <td>{{$single_product->ToBe_Sale_Unit_Price}}</td>
                        <td class="remark">{{$single_product->Remarks}}</td>
                        <td class="action_column">
                            <span >
                                <div class="action_element" style="float:left;">
                                    <a class="btn btn-info btn-sm" href="{{ URL::action('stockInController@stockInEditForm',[$single_product->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                </div>
                                <div class="action_element" >
                                    <a  class="delete btn btn-sm btn-danger" href="{{ URL::action('stockInController@stockInDelete',[$single_product->id])}}"><i class="fa fa-trash-o" ></i> Delete</a>
                                </div>
                            </span>
                        </td>
                        </tr>
                       @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Quantity</th>
                                <th>Seal Price</th>
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
