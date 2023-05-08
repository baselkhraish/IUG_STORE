<div class="col-lg-3 d-none d-lg-block">
    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Stores</h6>
        <i class="fa fa-angle-down text-dark"></i>
    </a>
    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
@php
    $stores = App\Models\Store::all();
@endphp
@foreach ($stores as $item)
    <a href="{{ route('shop.show',$item->id) }}" class="nav-item nav-link">{{ $item->name }}</a>
@endforeach
        </div>
    </nav>
</div>
