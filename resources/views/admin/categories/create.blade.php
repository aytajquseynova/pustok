@extends('admin.layout.master')
@section('content')
<div class="content-wrapper ml-2">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
            <div class="form-group">
                <label for="exampleInputPassword1">Kategoriyanın adı {{$lang}} dilində</label>
                <input name="title[{{ $lang }}]" value="{{  old('title.' . $lang) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
            </div>
            @error("title.$lang")
            <span>{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="tags">Tagların adı {{$lang}} dilində </label>
                <input name="tags[{{ $lang }}]" value="{{ old('tags.' . $lang) }}" type="text" class="form-control" placeholder="Enter tags">
                @error("tags.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="product_title">Product Title {{$lang}} dilində</label>
                <input name="product_title" value="{{ old('product_title.' . $lang) }}" type="text" class="form-control" placeholder="Enter product title">
                @error("product_title.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="brands">Brands {{$lang}} dilində</label>
                <input name="brands" value="{{ old('brands.' . $lang) }}" type="text" class="form-control" placeholder="Enter brands">
                @error("brands.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="product_code">Product Code {{$lang}} dilində</label>
                <input name="product_code" value="{{ old('product_code.' . $lang) }}" type="text" class="form-control" placeholder="Enter product code">
                @error("product_code.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description {{$lang}} dilində</label>
                <textarea name="description" class="form-control" id="description" placeholder="Enter description"></textarea>
                @error("description.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            @endforeach

            <div class="form-group">
                <label for="ex_tax">Ex Tax </label>
                <input name="ex_tax" value="{{ old('ex_tax' ) }}" type="number" class="form-control" placeholder="Enter ex tax">
                @error("ex_tax")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="reward_points">Reward Points </label>
                <input name="reward_points" value="{{ old('reward_points' ) }}" type="number" class="form-control" placeholder="Enter reward points">
                @error("reward_points")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" value="{{ old('price') }}" type="number" class="form-control" id="price" placeholder="Enter price" step="0.01">
                @error("price")
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Old Price</label>
                <input name="old_price" value="{{ old('old_price') }}" type="number" class="form-control" id="price" placeholder="Enter  old price" step="0.01">
                @error("old_price")
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleSelectRounded0">Select related category</label>
                    <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="category_id">
                        <option value="0">Main Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <input name="status" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Status</label>
                </div>
                <div class="form-check">
                    <input name="availability" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Availability</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection