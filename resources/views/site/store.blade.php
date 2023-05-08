@extends('site.layouts.master')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Store</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('site.index') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Store</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container pt-5">
        <div class="row px-xl-5">

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            <form action="{{ route('site.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name" value="{{ request()->keyword }}" name="keyword">
                                    <div class="input-group-append">
                                        <button class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    @forelse ($stores as $item)
                    <div class="col-lg-4 col-md-6 pb-1">
                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                            <p class="text-right"></p>
                            <a href="{{ route('shop.show',$item->id) }}" class="cat-img position-relative overflow-hidden mb-3">
                                <img style="width: 385px; height:240px; object-fit: cover;" class="img-fluid" src="{{ asset('uploads/images/stores/'.$item->logo) }}" alt="">
                            </a>
                            <h5 class="font-weight-semi-bold m-0">{{ $item->name }}</h5>
                        </div>
                    </div>
                    @empty
                    <p class="text-danger">No Stores</p>
                    @endforelse


                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    @stop
