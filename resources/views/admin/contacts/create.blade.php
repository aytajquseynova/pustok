@extends('admin.layout.master')
@section('content')

<div class="card-body">
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
            <input name="phone1" type="text" class="form-control" placeholder="Enter Phone 1" value="{{ old('phone1') }}">
            @error('phone1')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone2">Phone 2:</label>
            <input name="phone2" type="text" class="form-control" placeholder="Enter Phone 2" value="{{ old('phone2') }}">
            @error('phone2')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone3">Phone 3:</label>
            <input name="phone3" type="text" class="form-control" placeholder="Enter Phone 3" value="{{ old('phone3') }}">
            @error('phone3')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input name="address" type="text" class="form-control" placeholder="Enter Address" value="{{ old('address') }}">
            @error('address')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" type="text" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
