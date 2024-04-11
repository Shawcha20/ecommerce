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
                                <h1>Update Product</h1>
                            </div>
                            <div class="row">
                                <div class="container justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card p-4 m-5">
                                            <form action="{{ route('admin.update',['id'=>$item->id]) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Product Name</label>
                                                    <input type="text" name="name"class="form-control"
                                                        value={{ $item->name}}>
                                                    <span class="text-danger">
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Product Details</label>
                                                    <textarea type="text" name="details" row="4" class="form-control" >{{ $item->details }}</textarea>
                                                    <span class="text-danger">
                                                        @error('details')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="number" name="price" class="form-control"
                                                        value={{ $item->price }}>
                                                    <span class="text-danger">
                                                        @error('price')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="discount">Discount Price</label>
                                                    <input type="number" name="dis_price" class="form-control"
                                                        value={{ $item->discount}}>
                                                    <span class="text-danger">
                                                        @error('dis_price')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="catagory" class="form-label">Catagory</label>
                                                    <select name="catagory" id="" class="form-control text-white">
                                                        <option value="null" disabled selected>select catagory</option>
                                                        <option value="shirt">Shirt</option>
                                                        <option value="pant">Pant</option>
                                                        <option value="frok">Frok</option>
                                                        <option value="threepis">Threepis</option>
                                                        <option value="vorka">Vorka</option>
                                                        <option value="shoe">Shoe</option>

                                                    </select>
                                                    <span class="text-danger">
                                                        @error('catagory')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Product Image</label>
                                                    <input type="file" class="form-control" name="image">
                                                    <span class="text-danger">
                                                        @error('image')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Product</button>
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
