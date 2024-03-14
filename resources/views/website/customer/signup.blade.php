@extends('layouts.website')
@section('website-content')

<section class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
 
                <div class="card px-5 py-3">
                    <div class="card-header">
                      <h3 class="text-center text-success text-uppercase">Customer Sign-Up</h3>
                    </div>
                
                    <div class="card-body p-2">
                      <form action="{{route('customerStore')}}" method="post">
                          @csrf
                        <div class="form-group p-1">
                            <label for="">Name</label>
                            <input type="text" name="name"  class="form-control px-3  @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Name *">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="form-group p-1">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" class="form-control px-3  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Phone Number *">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        
                        <div class="form-group p-1">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control px-3  @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        <div class="form-group p-1">
                            <label for="">District</label>
                            <select name="district_id" id="district_id" class="form-control px-3  @error('district_id') is-invalid @enderror">
                              <option value="">Select District</option>
                              @foreach ($district as $item)
                                <option value="{{$item->id}}" {{ old('district_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group p-1">
                            <label for="">Thana</label>
                            <select name="thana_id" id="thana_id" class="form-control px-3  @error('thana_id') is-invalid @enderror">
                                @foreach ($thana as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('thana_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group p-1">
                            <label for="">Area</label>
                            <select name="area_id" id="area_id" class="form-control px-3  @error('area_id') is-invalid @enderror">
                                @foreach ($area as $item)
                                <option value="{{$item->id}}" {{ old('area_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('area_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group p-1">
                            <label for="">Address</label>
                            <textarea name="address"  class="form-control px-3  @error('address') is-invalid @enderror" rows="3" placeholder="Address">{{ old('address') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        <div class="form-group py-3">
                            <span class="ms-auto">
                                <button type="submit" class="btn btn-success ">Sign Up</button>
                            </span>
                        </div>
                        <div class="text-center">
                          <a class="fs-9 fw-bold" href="{{ route('customer.signup') }}">Already have an account?</a>
                      </div>
                    </form>
                    </div>
                  </div>
            </div>

        </div>
    </div>
</section>
@push('website-js')
<script type="text/javascript">
    //  Get Subject Javascript
    $(document).on("change","#district_id",function(){
      var district_id = $("#district_id").val();
      console.log(district_id);
        $.ajax({
          url:"{{route('thana.change')}}",
          type: "GET",
          data:{district_id:district_id},
          success:function(data){
            var html = '<option value="">Select Thana </option>';
            $.each(data,function(key,v){
              html += '<option value="'+v.id+'">'+v.name+' </option>';
            });
            $("#thana_id").html(html);
          }
      });
    });
  </script>
 <script type="text/javascript">
    //  Get Subject Javascript
    $(document).on("change","#thana_id",function(){
      var thana_id = $("#thana_id").val();
      
        $.ajax({
          url:"{{route('area.change')}}",
          type: "GET",
          data:{thana_id:thana_id},
          success:function(data) {
            var html = '<option value="">Select Area </option>';
            $.each(data,function(key,v){
              html += '<option value="'+v.id+'">'+v.name+' </option>';
            });
            $("#area_id").html(html);
          }
      });
  
  
    });
  </script>
    
@endpush
@endsection
