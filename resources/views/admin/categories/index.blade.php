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
                    <th style="width: 5%">Availability</th>
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
                    <td>{{$category->availability}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                                            @if ($errors->any())
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li class="text-danger"> {{$error}}</li>
                                                @endforeach
                                            </ul>
                                            @endif
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
