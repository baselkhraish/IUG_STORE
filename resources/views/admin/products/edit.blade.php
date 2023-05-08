@extends('admin.layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">edit Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Add new Product</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="" style="background: #f3f3f3">
    @include('admin.parts.errors')
    <form action="{{ route('admin.product.update',$products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>photo</label>
            <input type="file" class="form-control" name="photo" >
            <img style="width:50px;" src="{{ asset('uploads/images/products/'.$products->photo) }}" alt="">
        </div>

        <div class="form-group mt-3">
            <label>name</label>
            <input type="text" class="form-control" name="name" value="{{ $products->name }}">
        </div>

        <div class="form-group mt-3">
            <label>description</label>
            <textarea name="description">{{ $products->description }}</textarea>
        </div>



        <div class="form-group mt-3">
            <label>base_price</label>
            <input type="text" class="form-control" name="base_price" value="{{ $products->base_price }}">
        </div>

        <div class="form-group mt-3">
            <label>discount_price</label>
            <input type="text" class="form-control" name="discount_price" value="{{ $products->discount_price }}">
        </div>

        <div class="col-12 p-2">
            <div class="col-12">
                Flag
            </div>
            <div class="col-12 pt-3">
                <select class="form-control" name="falg">
                    <option @if($products->falg=="0" ) selected @endif value="0">base price</option>
                    <option @if($products->falg=="1" ) selected @endif value="1">discount price</option>
                </select>
            </div>
        </div>

        <div class="col-12 col-lg-12 p-2">
            <div class="col-12">
                Stores
            </div>
            @php
                $stores = App\Models\Store::all();
            @endphp
            <div class="col-12 pt-3">
                <select class="form-select" name="store_id" aria-label="Default select example">
                    <option disabled selected>Select stores</option>
                    @foreach ($stores as $item)
                        <option {{ $products->store_id == $item->id ? 'selected' : '' }}  value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

@stop
@section('scripts')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
@stop
