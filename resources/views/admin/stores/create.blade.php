@extends('admin.layouts.app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Add new Store</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Add new Store</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="" style="background: #f3f3f3">
    @include('admin.parts.errors')
    <form action="{{ route('admin.store.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label>logo</label>
            <input type="file" class="form-control" name="logo">
        </div>

        <div class="form-group mt-3">
            <label>name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group mt-3">
            <label>address</label>
            <input type="text" class="form-control" name="address">
        </div>


        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

@stop
