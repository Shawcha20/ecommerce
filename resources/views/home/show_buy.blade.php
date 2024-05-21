@extends('layout.home')
@section('title','buy')
@section('basic')
@if(isset($success))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $success }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <div class="row">
        <div class="col-md-10 offset-md-1 grid-margin stretch-card">
            <div class="card">
                <div class="card-body mt-5">
                    <div class="d-flex flex-row justify-content-center">
                        <h1 class="font-weight-bold">Ordered Items</h1>
                    </div>
                    <div class="row">
                        <table class="table">
                            <tbody class="text-black font-weight-bold">
                                @foreach ($ordered as $cart_item)
                                    <tr>
                                        <td class="col-md-2"><h3>{{ $cart_item->product_name }}</h3></td>
                                        <td class="col-md-2"><h3 class="product-price" data-original-price="{{ $cart_item->product_price }}">{{ $cart_item->product_price }}</h3></td>
                                        <td class="col-md-2">
                                                <h3>{{$cart_item->producct_price}}</h3>
                                            </div>
                                        </td>
                                        <td class="col-md-2"><img src="products/{{ $cart_item->image }}" alt="" style="height: 3rem; width: 3rem;"></td>
                                        <td class="col-md-2">{{ $cart_item->status }}</td>
                                        <td class="col-md-2"><div class="btn btn-danger"><a href="{{ route('cancle.buy',['id'=>$cart_item->id,'user_id'=>$user->id]) }}" class="text-white">Cancle order</a></div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
