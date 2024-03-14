@extends('layouts.website')
@section('website-content')
<style>
    .padding-left {
        padding-left: 40px;
    }
</style>
<section class="py-3">
    <div class="container padding-left">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</section>
<section class="pb-3">
    <div class="container padding-left">
        <div class="row">
            <div class="col-md-6 col-12">
                <h2>{{$content->about_title}}</h2>
                <p>
                    {!!$content->about_description!!}
                </p>
            </div>
            <div class="col-md-6 col-12">
                <div class="about-img">
                    <img src="{{asset($content->about_image)}}" alt="" class="w-100 h-100">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="management" class="py-3 bg-light">
    <div class="container padding-left">
        <h1 class="text-center py-3 text-success">Management</h1>
        <div class="row">
            @foreach ($management as $item)
            <div class="col-lg-3 col-md-4 col-12">
                <div class="card">
                    <img src="{{asset($item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center">{{$item->name}}</h5>
                      <h6 class="text-center fw-bolder">{{$item->designation}}</h6>
                      <div class="social-link d-flex ">
                          <a href="{{$item->facebook}}" target="_blank" class="m-auto"><i class="fab fa-facebook" ></i></a>
                          <a href="{{$item->twitter}}" target="_blank" class="m-auto"><i class="fab fa-twitter"></i></a>
                          <a href="{{$item->linkedin}}" target="_blank" class="m-auto"> <i class="fab fa-linkedin-in"></i></a>
                          <a href="{{$item->instagram}}" target="_blank" class="m-auto"><i class="fab fa-instagram"></i></a>
                      </div>
                    </div>
                  </div>
            </div> 
            @endforeach
            
        </div>
    </div>
</section>
<section id="mission" class="py-3 bg-white">
    <div class="container padding-left">
        <h1 class="text-center text-success pb-3">Mission & Vission</h1>
        {!!$content->mission_vision!!}
    </div>
</section>


@endsection
