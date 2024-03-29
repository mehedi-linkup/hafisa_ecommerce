@extends('layouts.website')
@section('website-content')

    <div class="container">
        <h2 class="text-center text-success py-3">Order Details</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-5" >
                    <div class="card-body">
                        <div class="">
                            <div class="order_details d-flex w-100">
                                <span class="">Order No.</span> <span class=" ms-auto">{{$invoice->invoice_no}}</span>
                              </div>
                            <div  class="order_details d-flex w-100">
                              <span class="">Order From.</span> <span class="ms-auto">{{$invoice->billing_address}}</span>
                            </div>
                            <div class="w-100" style="border-bottom: 1px dotted#000;width:100%"></div>
                            @foreach ($order as $item)
                                <div class="d-flex w-100 order_details">
                                    <span class="me-2"> {{$item->quantity}}x</span> <span>{{$item->product_name}}</span> <span class="ms-auto">{{(int)$item->price *$item->quantity }} Tk</span>
                                </div>
                            @endforeach
                            <div  class="order_details d-flex w-100">
                                <span >Sub Total</span> <span class="ms-auto">{{(int)$invoice->total_amount-$invoice->shipping_cost}} Tk</span>
                              </div>
                            <div  class="order_details d-flex w-100">
                              <span class="">Delivery  Charge.</span> <span class="ms-auto">{{$invoice->shipping_cost}} Tk</span>
                            </div>
                            <div class="w-100" style="border-bottom: 1px dotted#000;width:100%"></div>
                            <div  class="order_details d-flex w-100">
                              <span class="total_btn fw-bolder">Total</span> <span class="ms-auto fw-bolder">{{$invoice->total_amount}} Tk</span>
                            </div>
                        </div>
                     
        
                    
                      
                    </div>
                  </div>
            </div>
        </div>
       
    </div>


@endsection
