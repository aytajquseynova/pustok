@extends('admin.layout.master')
@section('content')
<div class="content-wrapper ml-2">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.brands.store') }}">
            @csrf
            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
            <div class="form-group">
                <label for="exampleInputPassword1">Brendin adı {{$lang}} dilində</label>
                <input name="title[{{ $lang }}]" value="{{  old('title.' . $lang) }}" type="text" class="form-control" placeholder="Brendin adını daxil edin">
            </div>
            @error("title.$lang")
            <span>{{ $message }}</span>
            @enderror
            @endforeach

            <div class="card-body">
           
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