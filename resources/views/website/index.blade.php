@extends('layouts.website')
@section('website-content')
<style>
    @media screen and ( max-width: 767px ){
        .single-slide {
            height: 180px;
            width: 100%;
        }
    }

    .carousel-wrap {
        width: 100%;
        position: relative;
    }

    /* fix blank or flashing items on carousel */
    .owl-carousel .item {
        position: relative;
        z-index: 100; 
        -webkit-backface-visibility: hidden; 
    }

    /* end fix */
    .owl-carousel .owl-nav button {
        margin-top: -26px;
        position: absolute;
        top: 50%;
        color: #ffffff40 !important
    }

    .owl-carousel .owl-nav i {
        font-size: 52px;
    }

    .owl-carousel .owl-nav .owl-prev {
        left: 0px;
    }

    .owl-carousel .owl-nav .owl-next {
        right: 0px;
    }
    .owl-carousel .owl-carousel .owl-item img {
        border-radius: unset;
    }
</style>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="carousel-wrap">
                    <div class="owl-carousel">
                    @foreach ($banner as $item)
                      <div class="item"><img src="{{asset($item->image)}}" style="border-radius:unset"></div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Owl slider  -->
<!-- Start Category Section -->
<section class="mt-4">
    
    <div class="container-fluid">
        <div class="feature-h5 pb-2">
            <h5>Product Category</h5>
        </div>
        <div class="row">
            @foreach ($category as $item)
            @if($item->SubCategory->count() == 0)
            <div class="col-lg-2 col-md-6 col-6 mb-2">
                <div style="box-shadow: 0px 0 3px #80808082;">
                    <a href="{{route('categoryWise.list', $item->slug)}}" class="row">
                        <div class="col-lg-12 col-md-6 col-12 text-center">
                            <div class="category-img py-2">
                                <img src="{{ asset($item->image) }}" alt="" loading="lazy">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="category-title py-2" style="background-color:#03a84e;">
                                <p class=" text-center mb-0">{{ Str::limit($item->name, 12, '...') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @else 
            <div class="col-lg-2 col-md-6 col-6 mb-2">
                <div style="box-shadow: 0px 0 3px #80808082;">
                    <a href="{{route('single.subcategory.list', $item->slug)}}" class="row">
                        <div class="col-lg-12 col-md-6 col-12 text-center">
                            <div class="category-img py-2">
                                <img src="{{ asset($item->image) }}" alt="" loading="lazy">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="category-title py-2" style="background-color:#03a84e;">
                                <p class=" text-center mb-0">{{ Str::limit($item->name, 12, '...') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
            
        </div>
    </div>
</section>

<!-- End Category Section -->
<!-- Recent Product Section -->
<section class="py-4">
    <div class="container-fluid">
        <div class="feature-h5">
            <h5>Recent Product</h5>
        </div>
        <div class="row">
            @foreach ($recent as $item)
            @php
            $discount = 0;
            $discount = $item->discount;
            $stock = $item->inventory->purchage;  
            $discount_price =$item->price - $item->price*$discount/100;  
            @endphp
            <div class="lg-2 col-md-6 col-6 ">
                    <div class="section-item">
                        <div class="main-card-body position-relative">
                             <img src="{{ asset('uploads/product/'.$item->image)}}" alt="" loading="lazy">
                            @if ($item->discount != NULL)
                            <span class="discount position-absolute">{{(int)$discount}}%</span>
                            @endif
                            <div class="product-price">
                                <h6 class="text-center fw-bolder mt-2 mb-0">{{$item->name}}</h6>
                                @if($item->discount >0)
                                <p class="text-center"> <span class="text-danger mx-2">{{$discount_price}} TK</span><span class=" text-decoration-line-through">{{$item->price}} TK</span></p>
                                @else 
                                <p class="text-center fw-bold mb-1">{{$item->price}} TK</p>
                                @endif
                                
                            </div>
                            <div class="overlay-1 overlay-1{{$item->id}}" id="overlay-1" >
                                @if ($stock<1)
                                <div class="add-to-cart-part">
                                    <h5>Stock Out</h5>
                                </div>
                                @else
                                <div class="add-to-cart-part add" onclick="addToCard({{$item->id}})">
                                    <h5>Add To Shopping Card</h5>
                                </div>
                                @endif
                                <div class="view-btn position-absolute bottom-0 w-100 text-center details-btn">
                                    <a href="{{route('product.details',$item->slug)}}" class="text-center text-dark ">Details</a>
                                </div>
                            </div>
                            <div class="overlay-2 overlay-2{{$item->id}}">
                                <h5 class="text-center pt-3 text-white">{{$item->price}} TK</h5>
                                <div class="qtyField addTocard-2">
                                    <span class="p-m qtyBtn minus add"><i class="fas fa-minus"></i></span> 
                                    <input type="hidden" value="{{$item->id}}" id="id" name="id" class="id">
                                    <span><input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty"></span>
                                    <span class="p-m qtyBtn plus add"> <i class="fas fa-plus"></i></span>
                                </div>
                            </div>
                        
                        </div>
                        @if ($stock<1)
                        <div class="d-flex mb-3">
                            <a  href="javascript:void(0);" class="btn-details1 w-100" >Stock Out</a>
                        </div>
                        @else
                        <div class="d-flex mb-3">
                            <a  href="javascript:void(0);" class="btn-details1 w-100 add" onclick="addToCard({{$item->id}})">Add To Cart</a>
                        </div>
                        @endif
                    
                    </div>
                    
                </div>
            @endforeach
            <div class=" text-end">
                <a href="{{route('all.product')}}" class="btn btn-warning fw-bolder" >View All</a>
            </div>
            <!-- <div class="lg-2 col-md-6 col-12 ">
                <div class="section-item">
                    <img src="{{ asset('website') }}/image/arrive;l-5.jpg" alt="">
                    <div class="product-price">
                        <h6 class="text-center fw-bolder mt-2 mb-0">Man,s Shirt</h6>
                        <p class="text-center fw-bold mb-1">420 TK</p>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="#" class="btn-details1 w-100">Add To Cart</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- End Product Section -->
<!-- Start Banner Section -->
<section class="banner">
    <div class="container">
        @foreach ($fullAd as $item)
        <div class="row vertical-align">
            <div class="col-lg-6 col-md-6 col-6 banner-text py-3">
                <h3 class="fs-2 fw-bold text-uppercase">{{$item->title}}</h3>
                
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <div class="banner-image text-center"> <img class="w-100" src="{{ asset($item->image)}}" alt=""> </div>
            </div>
        </div>
        @endforeach
       
    </div>
</section>
<!-- End Banner Section -->

<!-- Start Feature Product -->
<section class="feature-section py-2">
    <div class="container-fluid">
        <div class="feature-h5 ">
            <h5 class="">Popular Product</h5>
        </div>
        <div class="row">
            @foreach ($popular as $item)
            <div class="lg-2 col-md-6 col-6 ">
                <div class="section-item">
                    <div class="main-card-body position-relative">
                        @php
                            $discount = 0;
                            $discount = $item->discount;

                         $stock = $item->inventory->purchage;
                         $discount_price =$item->price - $item->price*$discount/100; 
                         
                     @endphp
                       <img src="{{ asset('uploads/product/thumbnail/'.$item->thum_image)}}" alt="">
                        @if ($item->discount != NULL)
                        <span class="discount position-absolute">{{(int)$discount}}%</span>
                        @endif
                        <div class="product-price">
                            <h6 class="text-center fw-bolder mt-2 mb-0">{{$item->name}}</h6>
                            @if($item->discount >0)
                            <p class="text-center"> <span class="text-danger mx-2">{{$discount_price}} TK</span><span class=" text-decoration-line-through">{{$item->price}} TK</span></p>
                            @else 
                            <p class="text-center fw-bold mb-1">{{$item->price}} TK</p>
                            @endif
                            
                        </div>
                      
                        <div class="overlay-1 overlay-1{{$item->id}}" id="overlay-1" >
                            @if ($stock<1)
                            <div class="add-to-cart-part">
                                <h5>Stock Out</h5>
                            </div>
                            @else
                            <div class="add-to-cart-part add" onclick="addToCard({{$item->id}})">
                                <h5>Add To Shopping Card</h5>
                            </div>
                            @endif
                            <div class="view-btn position-absolute bottom-0 w-100 text-center details-btn">
                                <a href="{{route('product.details',$item->slug)}}" class="text-center text-dark ">Details</a>
                            </div>
                        </div>
                        <div class="overlay-2 overlay-2{{$item->id}}">
                            <h5 class="text-center pt-3 text-white">{{$item->price}} TK</h5>
                            <div class="qtyField addTocard-2">
                                <span class="p-m qtyBtn minus add"><i class="fas fa-minus"></i></span> 
                                <input type="hidden" value="{{$item->id}}" id="id" name="id" class="id">
                                <span><input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty"></span>
                                <span class="p-m qtyBtn plus add"> <i class="fas fa-plus"></i></span>
                                
                            </div>
                            
                        </div>
                       
                    </div>
                    @if ($stock<1)
                    <div class="d-flex mb-3">
                        <a  href="javascript:void(0);" class="btn-details1 w-100" >Stock Out</a>
                    </div>
                    @else
                    <div class="d-flex mb-3">
                        <a  href="javascript:void(0);" class="btn-details1 w-100 add" onclick="addToCard({{$item->id}})">Add To Cart</a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Feature Product -->
<!-- Start Banner Section 2 -->
<!-- Start Banner Section 2 -->
{{-- <div class="banner-section-2">
    <div class="container-fluid">
        <div class="row py-5 d-flex justify-content-center">
            <div class="get-offer">
                <h1 class="mb-0">Get Offer From Your First Shopping!</h1>
                <p class="shopping-text mb-0">Happy Shopping</p>
            </div>
        </div>
    </div>
</div> --}}
<!-- End New arrivel Section -->
<section class="feature-section py-4">
    <div class="container-fluid">
        <div class="feature-h5 ">
            <h5 class=""> New Arrival</h5>
        </div>
        <div class="row">
            @foreach ($new_arrival as $item)
            <div class="lg-2 col-md-6 col-6 ">
                <div class="section-item">
                    <div class="main-card-body position-relative">
                        @php
                            $discount = 0;
                            $discount = $item->discount;

                         $stock = $item->inventory->purchage;
                         $discount_price =$item->price - $item->price*$discount/100; 
                         // if($stock < 1)
                         // echo 'stock out';
                        @endphp
                        <!-- <img src="{{ asset('website') }}/image/arrive;l-5.jpg" alt=""> -->
                       <img src="{{ asset('uploads/product/'.$item->image)}}" alt="" loading="lazy">
                        @if ($item->discount != NULL)
                        <span class="discount position-absolute">{{(int)$discount}}%</span>
                        @endif
                        <div class="product-price">
                            <h6 class="text-center fw-bolder mt-2 mb-0">{{$item->name}}</h6>
                            @if($item->discount >0)
                            <p class="text-center"> <span class="text-danger mx-2">{{$discount_price}} TK</span><span class=" text-decoration-line-through">{{$item->price}} TK</span></p>
                            @else 
                            <p class="text-center fw-bold mb-1">{{$item->price}} TK</p>
                            @endif
                            
                        </div>
                      
                        <div class="overlay-1 overlay-1{{$item->id}}" id="overlay-1" >
                            @if ($stock<1)
                            <div class="add-to-cart-part">
                                <h5>Stock Out</h5>
                            </div>
                            @else
                            <div class="add-to-cart-part add" onclick="addToCard({{$item->id}})">
                                <h5>Add To Shopping Card</h5>
                            </div>
                            @endif
                            <div class="view-btn position-absolute bottom-0 w-100 text-center details-btn">
                                <a href="{{route('product.details',$item->slug)}}" class="text-center text-dark ">Details</a>
                            </div>
                        </div>
                        <div class="overlay-2 overlay-2{{$item->id}}">
                            <h5 class="text-center pt-3 text-white">{{$item->price}} TK</h5>
                            <div class="qtyField addTocard-2">
                                <span class="p-m qtyBtn minus add"><i class="fas fa-minus"></i></span> 
                                <input type="hidden" value="{{$item->id}}" id="id" name="id" class="id">
                                <span><input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty"></span>
                                <span class="p-m qtyBtn plus add"> <i class="fas fa-plus"></i></span>
                                
                            </div>
                            
                        </div>
                       
                    </div>
                    @if ($stock<1)
                    <div class="d-flex mb-3">
                        <a  href="javascript:void(0);" class="btn-details1 w-100" >Stock Out</a>
                    </div>
                    @else
                    <div class="d-flex mb-3">
                        <a  href="javascript:void(0);" class="btn-details1 w-100 add" onclick="addToCard({{$item->id}})">Add To Cart</a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
