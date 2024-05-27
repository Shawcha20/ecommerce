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
                            <h1>Show Offers</h1>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">Sl no</th>
                                        <th scope="col">Offer Title</th>
                                        <th scope="col">Offer product</th>
                                        <th scope="col">Offer Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach ($offer as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->offerTitle}}</td>
                                        <td>{{ $item->offerProduct }}</td>
                                        <td>{{ $item->offerDes }}</td>
                                        <td><div class="btn btn-primary"><a href="{{ route('admin.updateoffer',['id'=>$item->id,'user'=>$user->id]) }}" class="text-white">update</a></div></td>
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
