@extends('admin.layout.master')

@section('content')

<div class="content-wrapper ml-2">
    <div class="card card-primary">
        <!-- form start -->
        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="card-body">
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" value="{{ $product->author }}" class="form-control" placeholder="Enter author">
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $product->title }}" class="form-control" placeholder="Enter title">
                </div>

                <div class="form-group">
                    <label for="main_image">Main Image</label>
                    <input type="file" name="main_image" class="form-control-file">
                    <img style="width: 150px; object-fit: cover;" src="{{ asset($product->main_image) }}" alt="">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Enter price">
                </div>

                <div class="form-group">
                    <label for="percent">Percent</label>
                    <input type="number" name="percent" value="{{ $product->percent }}" class="form-control" placeholder="Enter percent">
                </div>

                <div class="form-group">
                    <label for="exampleSelectRounded0">Select related category</label>
                    <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="category_id">
                        <option value="0">Main Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    <label for="exampleSelectRounded0">Select related brands</label>
                    <select name="brand_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                        <option value="0">main brand</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection