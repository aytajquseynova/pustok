@extends('admin.layout.master')

@section('content')
<div class="content-wrapper" >
    <div class="card card-primary" style="margin-left:10px">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('admin.categories.store')}}">
                @csrf
                @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                <div class="form-group">
                    <label for="exampleInputEmail1">Title {{$lang}}</label>
                    <input name="title[{{$lang}}]" value="{{old('title.' . $lang)}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                  </div>
                  @if($errors->has('title.' . $lang))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{$errors->first('title.' . $lang)}}
                    </div>
                  
                  @endif
                @endforeach
                <div class="card-body">
                  
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Select related category</label>
                  <select name="category_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="0">main category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-check">
    <input name="status"  type="checkbox" class="form-check-input" id="exampleCheck1" >
    <label class="form-check-label" for="exampleCheck1">Status</label>
</div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>
@endsection