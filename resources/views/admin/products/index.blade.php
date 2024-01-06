@extends('admin.layout.master')

@section('content')

<div class="card-body">
  <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Create</a>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Author</th>
          <th>Title</th>
          <th style="width: 40px">Image</th>
          <th>Price</th>
          <th>Percent</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{ $product->author }}</td>
          <td>{{ $product->title }}</td>
          <td>
            <a target="_blank" href="{{ asset($product->main_image) }}">
              <img style="width: 150px; object-fit: cover;" src="{{ asset($product->main_image) }}" alt="">
            </a>
          </td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->percent }}</td>
          <td style="width:200px">
            <a class="btn btn-success mb-1" href="{{ route('admin.product_images', $product->id) }}">Images</a>
            <a class="btn btn-primary mb-1" href="{{ route('admin.products_add_image', $product->id) }}">Add Img</a>
            <div class="d-flex">
              <a class="btn btn-success me-2 mr-1" href="{{ route('admin.products.edit', $product->id) }}">
                <i class="fas fa-pencil-alt"></i>
              </a>
              <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
            </div>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection