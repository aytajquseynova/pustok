@extends('admin.layout.master')
@section('content')

<a href="{{ route('admin.categories.create') }}" class="btn btn-success ml-4">Create</a>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 10%">Title</th>
                    <th style="width: 10%">Slug</th>
                    <th style="width: 5%">Status</th>
                    <th style="width: 10%">Tags</th>
                    <th style="width: 10%">Product Title</th>

                    <th style="width: 5%">Availability</th>
                    <th style="width: 5%">Price</th>
                    <th style="width: 5%">Old Price</th>
                    <th style="width: 15%">Description</th>
                    <th style="width: 10%">Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->status}}</td>
                    <td>{{$category->tags}}</td>
                    <td>{{$category->product_title}}</td>
                    <td>{{$category->availability}}</td>
                    <td>{{$category->price}}</td>
                    <td>{{$category->old_price}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form onsubmit="return confirm('Are you sure?')" method="post" action="{{route('admin.categories.destroy', $category->id)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger ">
                                    <i class="fas fa-trash-alt"></i>
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
