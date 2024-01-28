@extends('admin.layout.master')
@section('content')
<div class="content-wrapper ml-2">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-danger"> {{$error}}</li>
                    @endforeach
                </ul>
                @endif
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
