@extends('admin.layout.master')

@section('content')
<style>
  a.active {
    display: block;
    border: 4px solid black;
  }
</style>

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
            <a class="{{$image->is_main==1 ? 'active' : '' }}" href="{{route('admin.add_main_image', ['id'=>$image->id,'product_id'=>$id])}}">
              <img style="width:150px" src="{{asset($image->img)}}" alt="">
            </a>
          </td>

          </form>

        </tr>
        </td>

        @endforeach

      </tbody>
    </table>
  </div>

@endsection