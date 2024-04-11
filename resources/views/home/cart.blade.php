@extends('layout.home')
@section('title','cart')
@section('basic')
<div class="row">
    <div class="col-md-10 offset-md-1 grid-margin stretch-card ">
        <div class="card ">
            <div class="card-body ">
                <div class="d-flex flex-row justify-content-center">
                    <h1>Cart items</h1>
                </div>
                <div class="row">
                    <table class="table">
                        <tbody class="text-white">
                            @foreach ($cart_items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @if(isset($item->discount))
                                    {{ $item->discount }}
                                    @else
                                    null
                                    @endif
                                </td>

                                <td><img src="/products/{{ $item->image }}" alt="" style="height: 200px;width: 150px;  object-fit: cover;"></td>
                                <td><div class="btn btn-primary"><a href="{{ route('admin.updated',['id'=>$item->id,'id1'=>$user->name]) }}" class="text-white">update</a></div></td>
                                <td ><div class="btn btn-danger"><a href="{{ route('admin.delete',['id'=>$item->id]) }}" class="text-white">delete</a></div></td>
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
