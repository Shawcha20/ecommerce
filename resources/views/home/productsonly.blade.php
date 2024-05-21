@extends('layout.home')

@section('title','ecommerce')
@section('basic')
@if(isset($success))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $success }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@include('home.product')
@include('home.footer')
@endsection
