@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
  <div class="card-body">
    <a href="{{route('admin.products.create')}}" class="btn btn-success mb-3">create</a>
    <table class="table table-bordered">
      <thead>
        <tr>

          <th>Author</th>
          <th>Title</th>
          <th style="width: 40px">Image</th>
          <th>Price</th>
          <th>Percent</th>
          <th>images</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{$product->author}}</td>
          <td>{{$product->title}}</td>
          <td>
            <img src="{{asset($product->main_image)}}" alt="">
          </td>
          <td>{{$product->price}}</td>
          <td>{{$product->percent}}</td>
          <td>
            <a class="btn btn-success" href="{{route('admin.product_images',$product->id)}}">images</a>
            <a class="btn btn-primary" href="{{route('admin.products_add_image', $product->id)}}">add image</a>
          </td>
          </form>

        </tr>
        </td>

        @endforeach

      </tbody>
    </table>
  </div>
</div>
@endsection