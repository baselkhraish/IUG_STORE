@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">ALL Transaction</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Datatables</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->




        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product name</th>
                                    <th>Store name</th>
                                    <th>price</th>
                                    <th>Buying succeeded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($treansaction as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->store_name }}</td>
                                        <td>{{ $item->sale }}</td>
                                        <td>{{ $item->created_at->format('Y-m-d  H:i:s'); }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end row-->


    </div>
    <!-- container-fluid -->
</div>




@stop
