@extends('layout.home')
@section('title','details')
@section('basic')
<div class="col-sm-6 col-md-4 col-lg-4 mt-5" style="margin:auto; width:50%;">
    <div class="box">
        <div class="option_container">
            <div class="options">
                <a href="#" class="option1">Product Details</a>
            </div>
        </div>
        <div class="img-box">
            <img src="/products/{{ $product->image }}" alt="">
        </div>
        <div class="detail-box">
            <h5>{{ $product->title }}</h5>
        </div>
        @if($product->discount!=null)
        <h6 style="color:red;">
        Discount Price
        <br>
        {{ $product->discount }}
        </h6>
        <h6>Price</h6>
        <h6 style="text-decoration:line-through; color:blue">
            {{ $product->price }}
        </h6>
        @else
        <h6>
            Price
            <br>
            {{ $product->price }}
        </h6>
        @endif
        <h6>Product Details: {{ $product->details }}</h6>
        <div class="row">
            @if(isset($user))
              @if($user!=null)
            <div class="btn btn-primary m-2" style="color:white;"><a href="{{ route('home.addcart',['id'=>$product->id,'user_id'=>$user->id]) }}" style="color:white;">Add to Cart</a></div>
            <div class="btn btn-info m-2"><a href="#" style="color:white;">Buy Now</a></div>
            @endif
            @else
            <div class="btn btn-primary m-2" style="color:white;"><a href="{{url('/product/login')}}" style="color:white;">Add to Cart</a></div>
            <div class="btn btn-info m-2"><a href="{{url('/product/login')}}" style="color:white;">Buy Now</a></div>

            @endif
        </div>
    </div>
</div>
@endsection

