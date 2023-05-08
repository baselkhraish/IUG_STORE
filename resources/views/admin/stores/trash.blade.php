@extends('admin.layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">ALL STORES Trash</h4>

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
                            <h5 class="card-title mb-0">All Stores Trash</h5>
                        </div>
                        <div>
                            <a href="{{ route('admin.store.index') }}" class="btn btn-success">ALL STORES</a>
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
                                    <th>logo</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img style="width:50px;" src="{{ asset('uploads/images/stores/'.$item->logo) }}" alt=""></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td style="width: 270px;">

                                            <form method="POST" action="{{ route('admin.stores.trashed.restore',$item->id) }}" class="d-inline-block">@csrf
                                                <button class="btn  btn-outline-success btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الاستعادة ؟');if(result){}else{event.preventDefault()}">
                                                    <span class="fas fa-reply "></span> Restore
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('admin.stores.trashed.destroy',$item->id) }}" class="d-inline-block">@csrf
                                                <button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                                    <span class="fas fa-trash "></span> Delete
                                                </button>
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
