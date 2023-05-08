@extends('admin.layouts.app')
@section('content')

<div style="display: flex; justify-content: space-around; align-items: center;">
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-lg"><i class="ri-add-line align-middle me-1"></i>Add Product</a>

    <a href="{{ route('admin.product.index') }}" class="btn btn-primary btn-lg"><i class="ri-add-line align-middle me-1"></i>All Product</a>



    <a href="{{ route('admin.store.create') }}" class="btn btn-primary btn-lg"><i class="ri-add-line align-middle me-1"></i>Add Store</a>


    <a href="{{ route('admin.store.index') }}" class="btn btn-primary btn-lg"><i class="ri-add-line align-middle me-1"></i>All Store</a>
</div>

@stop
