@extends('admin.layout.master')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Post lists</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a href="{{route('languageLine.create')}}" class="btn btn-primary btn-sm"><i class="icon-plus-circle2 mr-2"></i> Add Post</a>
            </div>
        </div>
    </div>
    <table class="table datatable-colvis-multi">
        <thead>
            <tr>
                <th>Group</th>
                <th>Key</th>
                <th>Text</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $language)

            <tr>
                <td>{{$language->group}}</td>
                <td>{{$language->key}}</td>
                <td>{{json_encode($language->text)}}</td>
                <td>
                    <div class="list-icons">
                        <a href="{{route('admin.languageLine.edit',$language->id)}}" class="list-icons-item"><i class="icon-pencil7"></i></a>
                        <a href="{{route('admin.languageLine.destroy',$language->id)}}" class="list-icons-item"><i class="icon-trash"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection