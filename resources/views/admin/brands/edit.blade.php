@extends('admin.layout.master')
@section('content')
<div class="content-wrapper ml-2">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.brands.update', ['brand' => $brand->id]) }}">
            @csrf
            @method('PATCH')
            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
            <div class="form-group">
                <label for="exampleInputPassword1">Brand Name in {{$lang}} language</label>
                <input name="title[{{ $lang }}]" value="{{  old('title.' . $lang, $brand->title[$lang] ?? '') }}" type="text" class="form-control" placeholder="Enter the brand name">
                @error("title.$lang")
                <span>{{ $message }}</span>
                @enderror
            </div>
            @endforeach

            <div class="card-body">
                <div class="form-check">
                    <input name="status" type="checkbox" class="form-check-input" id="exampleCheck1" {{ $brand->status ? 'checked' : '' }}>
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