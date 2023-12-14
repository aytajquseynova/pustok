@extends('admin.layout.master')

@section('content')
<div class="content-wrapper" >
    <div class="card card-primary" style="margin-left:10px">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype='multipart/form-data' method="POST" action="{{route('admin.products_store_image',['id'=>$id])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Image </label>
                  <input name="img" type="file" id="">
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>
@endsection
@extends('admin.layout.master')

@section('content')
<div class="content-wrapper" >
    <div class="card card-primary" style="margin-left:10px">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype='multipart/form-data' method="POST" action="{{route('admin.products_store_image',['id'=>$id])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Image </label>
                  <input name="img" type="file" id="">
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</div>
@endsection