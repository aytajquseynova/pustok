@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
<div class="card-body">
<a href="{{route('admin.categories.create')}}" class="btn btn-success mb-3">create</a>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th style="width: 40px">Status</th>
                     <th>Controls</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->title}}</td>
                      <td>{{$category->slug}}</td>
                      <td>{{$category->status}}</td>
                      <td style="display: flex; justify-content:space-evenly; align-items:center; ">
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success">edit</a>
                        <form onsubmit="return confirm('are you sure bro?')" method="post" action="{{route('admin.categories.destroy',$category->id)}}">
                      @method('delete')
                      @csrf
                      <input type="submit" style="width:150px; " class="btn btn-outline-danger m1" value="delete" type="text">
                    </form>
      
                    </tr>
                    </td>
                      
                    @endforeach
                    
                  
                  </tbody>
                </table>
              </div>
</div>
@endsection