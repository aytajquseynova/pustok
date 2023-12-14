@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
  <div class="card card-primary" style="margin-left:10px">
    <div class="card-header">
      <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form enctype="multipart/form-data" method="POST" action="{{route('admin.products.store')}}">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Author</label>
        <input name="author" value="" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input name="title" value="" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input name="price" value="" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Percent </label>
        <input name="percent" value="" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Image </label>
        <input name="main_image" type="file" name="" id="">
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection