<section class="footer-top py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-6">
                <div class="footer-logo d-flex align-items-center">
                    <a style="display: inline-block;width:100px;" href="{{route('home')}}"><img style="width: 100%" src="{{ asset('/') }}{{ $content->logo }}" alt=""></a>
                    <span style="color:#fff;display:inline-block">{{ $content->company_name }}</span>
                </div>
                <div style="font-size:13px;color:#fff;margin-top:10px">{!! Str::of($content->about_description)->words(25) !!}</div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <h1 class="fs-6 text-white">Information Link</h1>
                <ul class="information">
                    <li><a href="{{route('about.website')}}">About Us</a></li>
                    <li><a href="{{route('web.contact')}}">Contact Us</a></li>
                    <li><a href="{{route('about.website')}}#management">Our Management</a></li>
                    <li><a href="{{route('about.website')}}#mission">Our Mission and Vision</a></li>
                    {{-- <li><a href="{{asset('zenevia.apk')}}" download><img src="{{asset('download.png')}}" style="height:50px;width:60px" /></a></li>
                    <li><a href="{{asset('zenevia.apk')}}">Download Android App</a></li>   --}}
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <h1 class="fs-6 text-white">Social Link</h1>
                <ul class="information">
                    <li><a href="{{$content->facebook}}" target="_blank">Facebook</a></li>
                    <li><a href="{{$content->twitter}}"  target="_blank">Twitter</a></li>
                    <li><a href="{{$content->instagram}}"  target="_blank">Instagram</a></li>
                    <li><a href="{{$content->linkedin}}"  target="_blank">Linkedin</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <h1 class="fs-6 text-white">Address</h1>
                <ul class="information">
                    <li><a href="tel:{{$content->phone_1}}">Phone 1: {{$content->phone_1}}</a></li>
                    @if ($content->phone_2)
                    <li><a href="tel:{{$content->phone_1}}">Phone 2: {{$content->phone_2}}</a></li>
                    @endif
                   
                    <li><a href="mailto:{{$content->email}}">Email : {{$content->email}}</a></li>
                    <li><a href="javascript:void(0)">Address :{{$content->address}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="live-chat">
    <a href="{{route('web.contact')}}"><i class="fas fa-comment-dots"></i></a>
</div>
<section class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-md-6">
                <!--<div class="all-right py-2">All Rights Researved © Zenevia Express shop</div>-->
            </div>
            <div class="col-lg-6 col-md-6 col-md-6 d-flex justify-content-end">
                <div class="develop py-1">
                    <small>Design And Develop By <a href="http://linktechbd.com/">Link-up
                        Technology</a></small> </div>
            </div>
        </div>
    </div>
</section>
<!-- End Footer Section -->
</div>