
@extends('layout.admin')
@section('title', 'adminpage')
@section('admin')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 offset-md-1 grid-margin stretch-card ">
                <div class="card ">
                    <div class="card-body ">
                        <div class="d-flex flex-row justify-content-center">
                            @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                            @elseif($message=Session::get('error'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                    @endif
                        </div>
                        <div class="d-flex flex-row justify-content-center">
                            <h1>Show Product</h1>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">Sl no</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach ($product as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->details }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            @if(isset($item->discount))
                                            {{ $item->discount }}
                                            @else
                                            null
                                            @endif
                                        </td>
                                        <td>{{ $item->catagory }}</td>
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
    </div>
</div>
@endsection
