@extends('layout.admin')
@section('title','adminpage')
@section('admin')
<div class="container justify-content-center">
    <h1>new product</h1>
    <div class="col-sm-8">
        <div class="card p-4 m-5">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"  name="name"class="form-control" value={{ old('name') }}>
               <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
               </span>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text"  name="description" row="4" class="form-control" value="{{ old('description') }}"></textarea>
                <span class="text-danger">
                    @error('description')
                    {{ $message }}
                    @enderror
                   </span>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type="number"  name="price" class="form-control" value={{ old('price') }}>
               <span class="text-danger">
                @error('price')
                {{ $message }}
                @enderror
               </span>
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file"  class="form-control" name="image">
                <span class="text-danger">
                    @error('image')
                    {{ $message }}
                    @enderror
                   </span>
            </div>
            <button type="submit" class="btn btn-dark">submit</button>
        </form>
        </div>
    </div>
  </div>

@endsection
