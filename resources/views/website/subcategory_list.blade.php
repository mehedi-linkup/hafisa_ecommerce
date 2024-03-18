
@extends('layouts.website')
@section('website-content')

<section class="py-3">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
          </nav>
    </div>
</section>
<section>
    @foreach ($Categorylist->SubCategory as $item)
       
    @endforeach
    <div class="container">
        <div class="feature-h3 ">
            <h3>{{$Categorylist->name}}</h3>
        </div>
        <div class="row py-3">
            @foreach ($Categorylist->SubCategory as $item)
                <div class="col-lg-2 col-md-6 col-6 px-3 mb-2">
                    <div style="box-shadow: 0px 0 3px #80808082;">
                        <a href="{{route('SubCategoryWise.list',$item->slug)}}" class="row">
                            <div class="col-lg-12 col-md-6 col-12 text-center">
                                <div class="category-img py-2">
                                    <img src="{{ asset($item->image) }}" alt="" loading="lazy">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="category-title py-2" style="background-color:#03a84e;">
                                    <p class=" text-center mb-0">{{$item->name}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>


@endsection
