@extends('admin.layout.master')
@section('content')

<a href="{{ route ('admin.categories.create')}}" class="btn btn-success ml-4">Create</a>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>Slug</th>
                <th style="width: 40px">Status</th>
                <th>Controlls</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->status}}</td>
                <td class="d-flex  align-items-center">
                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success mr-2">Edit</a>
                    <form onsubmit="return confirm('are you sure?')" method="post" action="{{route('admin.categories.destroy', $category->id)}}">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger m-1" value="Delete" type="text">
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection