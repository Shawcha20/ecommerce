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
                                <h1>Update Offer</h1>
                            </div>
                            <div class="row">
                                <div class="container justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card p-4 m-5">
                                            <form action="{{ route('admin.updateofferpost',['user'=>$item->id]) }}"
                                                method="post" >
                                                @csrf
                                                <div class="form-group">
                                                    <label for="offertitle" class="form-label">Offer Title</label>
                                                    <input type="text" name="offertitle" class="form-control"
                                                    value={{ $item->offerTitle }}>
                                                    <span class="text-danger">
                                                        @error('offertitle')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Offer Product</label>
                                                    <input type="textr" name="offerProduct" class="form-control"
                                                        value={{ $item->offerProduct }}>
                                                    <span class="text-danger">
                                                        @error('offerProduct')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Offer Details</label>
                                                    <textarea type="text" name="offerDes" row="4" class="form-control" >{{ $item->offerDes }}</textarea>
                                                    <span class="text-danger">
                                                        @error('offerDes')
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
