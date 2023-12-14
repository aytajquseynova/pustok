@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
<div class="card-body">
<a href="{{route('admin.products_add_image', ['id'=>$id])}}" class="btn btn-success mb-3">create</a>
                <table class="table table-bordered">
                  <thead>
                    <tr>

                      <th>img</th>
                 
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($images as $image)
                    <tr>
                      <td>
                        <img style="width:150px" src="{{asset($image->img)}}" alt="">
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