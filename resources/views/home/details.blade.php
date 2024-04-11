@extends('layout.home')
@section('title','details')
@section('basic')
<section class="slider_section" id="home">
    <div class="d-flex">
        <div class="row" >
            <div>
                <img src="/products/{{ $product->image }}" alt="{{ $product->image }}" width="600px" height="600px" class="rounded m-5">
            </div>
            <div class="row justify-content-center d-inline">
                <h1>product details</h1>
            </div>
            <div>
                <div class="row">
                    <div>Name:</div>
                    <div>{{ $product->name }}</div>
                </div>
                <div class="row">
                    <div>Details</div>
                    <div>{{ $product->details }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
heeelo
