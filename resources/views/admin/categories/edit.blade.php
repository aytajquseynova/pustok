@extends('admin.layout.master')
@section('content')
<div class="content-wrapper ml-2">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
            @csrf
            @method('PATCH')
            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
            <div class="form-group">
                <label for="exampleInputPassword1">Kategoriyanın adı {{$lang}} dilində</label>
                <input name="title[{{ $lang }}]" value="{{  old('title.' . $lang) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                @error("title.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
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
                <label for="ex_tax">Ex Tax {{$lang}} dilində</label>
                <input name="ex_tax" value="{{ old('ex_tax.' . $lang) }}" type="text" class="form-control" placeholder="Enter ex tax">
                @error("ex_tax.$lang")
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
                <label for="reward_points">Reward Points {{$lang}} dilində</label>
                <input name="reward_points" value="{{ old('reward_points.' . $lang) }}" type="text" class="form-control" placeholder="Enter reward points">
                @error("reward_points.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="availability_{{ $lang }}">Availability {{ $lang }} dilində</label>
                <div class="form-check">
                    <input name="availability" value="1" type="checkbox" class="form-check-input" id="availability_{{ $lang }}" {{ old('availability.' . $lang) ? 'checked' : '' }}>
                    <label class="form-check-label" for="availability_{{ $lang }}">Available</label>
                </div>
                @error("availability.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" value="{{ old('price' ) }}" type="text" class="form-control" id="price" placeholder="Enter price">
                @error("price.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="old_price">Old Price</label>
                <input name="old_price" value="{{ old('old_price') }}" type="text" class="form-control" placeholder="Enter old price">
                @error("old_price.$lang")
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
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection