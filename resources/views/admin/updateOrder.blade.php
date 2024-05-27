@extends('layout.admin')
@section('title', 'adminpage')
@section('admin')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-8 offset-md-2 grid-margin stretch-card">
                    <div class="card ">
                        <div class="card-body ">
                            <div class="d-flex flex-row justify-content-center">
                                <div class="d-inline">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <h1>Update Order</h1>
                            </div>
                            <div class="row">
                                <div class="container justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card p-4 m-5">
                                            <form action="{{ route('update.order',['id'=>$item->id]) }}"
                                                method="post" >
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Status" class="form-label">Order Status</label>
                                                    <select name="status" id="" class="form-control text-white">
                                                        <option value="null" disabled selected>Processing</option>
                                                        <option value="Shipping">shipping</option>
                                                        <option value="Shipped">shipped</option>
                                                        <option value="Arrived">arrived</option>
                                                        <option value="On the way">on the way</option>
                                                        <option value="Delivered">Delivered</option>
                                                    </select>
                                                    <span class="text-danger">
                                                        @error('status')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Order</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
