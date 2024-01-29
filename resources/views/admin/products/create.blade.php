@extends('admin.layout.master')

@section('content')

<div class="card card-primary" style="margin-left:10px">
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
  <form enctype="multipart/form-data" method="POST" action="{{route('admin.products.store')}}">
    @csrf
    <div class="form-group">
      <label for="author">Author</label>
      <input name="author" value="" type="text" class="form-control" id="author" placeholder="Enter author">
    </div>
    <div class="form-group">
      <label for="title">Title</label>
      <input name="title" value="" type="text" class="form-control" id="title" placeholder="Enter title">
    </div>
     <div class="form-group">
                    <label for="title">Description</label>
                    <input type="text" name="title" value="" class="form-control" placeholder="Enter title">
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input name="price" value="" type="number" class="form-control" id="price" placeholder="Enter price">
    </div>
    <div class="form-group">
      <label for="percent">Percent </label>
      <input name="percent" value="" type="number" class="form-control" id="percent" placeholder="Enter percent">
    </div>
    <div class="form-group">
      <label for="image">Image </label>
      <input name="main_image" type="file" name="" id="">
    </div>

    <div class="form-group">
      <label for="exampleSelectRounded0">Select related category</label>
      <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" name="category_id">
        <option value="0">Main Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
      </select>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

@endsection
