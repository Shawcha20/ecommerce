@extends('layout.admin')
@section('title', 'Offer')
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
                                <h1>Add Offer</h1>
                            </div>
                            <div class="row">
                                <div class="container justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card p-4 m-5">
                                            <form action="{{ route('admin.offer') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="offertitle">Offer Title</label>
                                                    <input type="text" name="offertitle" class="form-control" value="{{ old('offertitle') }}">
                                                    <span class="text-danger">
                                                        @error('offertitle')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="offerproduct">Offer Product</label>
                                                    <input type="text" name="offerproduct" class="form-control" value="{{ old('offerproduct') }}">
                                                    <span class="text-danger">
                                                        @error('offerproduct')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="offerdes">Offer Description</label>
                                                    <textarea name="offerdes" rows="4" class="form-control">{{ old('offerdes') }}</textarea>
                                                    <span class="text-danger">
                                                        @error('offerdes')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add Offer</button>
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
