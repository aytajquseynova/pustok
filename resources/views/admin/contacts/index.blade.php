@extends('admin.layout.master')
@section('content')

<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Phone1</th>
                <th>Phone2</th>
                <th style="width: 40px">Phone3</th>
                <th>Email</th>
                <th>Address </th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->phone1}}</td>
                <td>{{$contact->phone2}}</td>
                <td>{{$contact->phone3}}</td>
                <td>{{$contact->email}}</td>
                 <td>{{$contact->address}}</td>
                <td class="d-flex  align-items-center">
                    <a href="{{route('admin.contacts.edit', ['contact' => $contact->id])}}" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                    <form onsubmit="return confirm('are you sure?')" method="post" action="{{route('admin.contacts.destroy',['contact' => $contact->id] )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-1">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
