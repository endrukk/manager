@extends('layouts.default')

@section('content')
    <table class="table">
        @if($table_content)
            <thead>
                <tr>
                    <th title="ID">ID</th>
                    <th title="Name">Name</th>
                    <th title="Role">Role</th>
                    <th title="Type">Type</th>
                    <th title="Active">Active</th>
                    <th title="Created">Created</th>
                    <th title="Updated">Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($table_content as $item)
                <tr>
                    <td title="ID">{{$item->id}}</td>
                    <td title="Name">{{$item->name}}</td>
                    <td title="Role">{{$item->role}}</td>
                    <td title="Type">{{$item->front}}</td>
                    <td title="Active">{{$item->active}}</td>
                    <td title="Created">{{$item->created}}</td>
                    <td title="Updated">{{$item->updated}}</td>
                </tr>
                @endforeach
            </tbody>
        @endif
    </table>
@endsection