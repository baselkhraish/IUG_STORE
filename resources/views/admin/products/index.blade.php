@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">ALL PRODUCTS</h4>

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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">All Products</h5>
                        </div>
                        <div>
                            <a href="{{ route('admin.product.create') }}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>photo</th>
                                    <th>base_price</th>
                                    <th>discount_price</th>
                                    <th>store</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img style="width:50px;" src="{{ asset('uploads/images/products/'.$item->photo) }}" alt=""></td>
                                        <td>{{ $item->base_price }}</td>
                                        <td>{{ $item->discount_price }}</td>
                                        <td>{{ $item->store->name }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('admin.product.edit', $item->id) }}">EDIT</a>

                                            <form class="d-inline" action="{{ route('admin.product.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirm('are you sure?')">DELETE</button>
                                            </form>
                                        </td>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        setTimeout(() => {
            $('.alert').slideUp(700);
        }, 1000);
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        @if (session('msg'))
            Toast.fire({
            icon: 'success',
            title: '{{ session('msg') }}'
            })
        @endif
    </script>
@stop
