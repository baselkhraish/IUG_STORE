@extends('site.layouts.master')
@section('slider')


<div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 410px;">
            <img class="img-fluid" src="{{ asset('siteasset/img/1.jpg') }}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="{{ asset('siteasset/img/2.jpg') }}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ما تلعب فيهم --}}
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>

@stop
@section('content')
<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">

        @foreach ($stores as $item)
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <a href="{{ route('shop.show',$item->id) }}" class="cat-img position-relative overflow-hidden mb-3">
                    <img style="width: 385px; height:240px; object-fit: cover;" class="img-fluid" src="{{ asset('uploads/images/stores/'.$item->logo) }}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0"><a  href="{{ route('shop.show',$item->id) }}">{{ $item->name }}</a></h5>
            </div>
        </div>
        @endforeach


    </div>
</div>
<!-- Categories End -->


<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <img src="{{ asset('siteasset/img/offer-1.png') }}" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">View all stores of our site at the best prices</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Stores Bests</h1>
                    <a href="{{ route('site.store') }}" class="btn btn-outline-primary py-md-2 px-md-3">ALL STORES</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img src="{{ asset('siteasset/img/offer-2.png') }}" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">View all products of our site at the best prices</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Product Bests</h1>
                    <a href="{{ route('site.shop') }}" class="btn btn-outline-primary py-md-2 px-md-3">ALL PRODUCTS
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($products as $item)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img  class="img-fluid w-100" style="width: 325px; height: 217px; object-fit: cover;" src="{{ asset('uploads/images/products/'.$item->photo) }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $item->name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>
                                @if ($item->falg == 0)
                                    {{ $item->base_price }}$
                                @else
                                    {{ $item->discount_price }}$
                                    <br><span class="text-danger" style="font-size: 13px">after discount</span>
                                @endif
                            </h6>
                            <h6 class="text-muted ml-2"></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ route('product.show',$item->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <form action="{{ route('site.transactions', $item->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $item->id  }}">
                            <input type="hidden" name="product_name" value="{{ $item->name  }}">
                            <input type="hidden" name="store_name" value="{{ $item->store->name  }}">
                            <input type="hidden" name="sale" value="
                                            @if ($item->falg == 0)
                                                {{ $item->base_price }}$
                                            @else
                                                {{ $item->discount_price }}$
                                            @endif">
                            <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>
<!-- Products End -->
@stop
