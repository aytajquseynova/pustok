@extends('admin.layout.master')
@section('content')
<div class="content-wrapper ml-2">
    <div class="card card-primary">
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
      <form method="post" action="{{ route('admin.contacts.store') }}">
    @csrf

    <div class="form-group">
        <label for="phone1">Phone 1:</label>
        <input name="phone1" value="{{ old('phone1') }}" type="text" class="form-control" placeholder="Enter Phone 1">
    </div>
    @error('phone1')
        <span>{{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="phone2">Phone 2:</label>
        <input name="phone2" value="{{ old('phone2') }}" type="text" class="form-control" placeholder="Enter Phone 2">
    </div>
    @error('phone2')
        <span>{{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="phone3">Phone 3:</label>
        <input name="phone3" value="{{ old('phone3') }}" type="text" class="form-control" placeholder="Enter Phone 3">
    </div>
    @error('phone3')
        <span>{{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="address">Address:</label>
        <input name="address" value="{{ old('address') }}" type="text" class="form-control" placeholder="Enter Address">
    </div>
    @error('address')
        <span>{{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="email">Email:</label>
        <input name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Enter Email">
    </div>
    @error('email')
        <span>{{ $message }}</span>
    @enderror

    <!-- Diğer form alanlarını buraya ekleyin -->

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
</div>
@endsection
