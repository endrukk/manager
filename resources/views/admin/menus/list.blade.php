@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="d-flex">
                        <a role="button" href="{{route('admin.menu.edit', 0)}}" class="btn btn-success ml-auto">New Meun</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-dark table-dark">
                            @if($table_content)
                                <thead>
                                    <tr>
                                        <th scope="col" title="ID">ID</th>
                                        <th scope="col" title="Name">Name</th>
                                        <th scope="col" title="Role">Role</th>
                                        <th scope="col" title="Type">Type</th>
                                        <th scope="col" title="Active">Active</th>
                                        <th scope="col" title="Created">Created</th>
                                        <th scope="col" title="Updated">Updated</th>
                                        <th scope="col" title="Actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($table_content as $item)
                                    <tr>
                                        <td title="ID">{{$item->id}}</td>
                                        <td title="Name">{{$item->name}}</td>
                                        <td title="Role">{{$item->role}}</td>
                                        <td title="Type">
                                            @if(intval($item->front) == 1)
                                                front
                                            @else
                                                admin
                                            @endif
                                        </td>
                                        <td title="Active">
                                            <span class="icon">
                                                <i class="fas fa-{{ (( intval($item->active) == 0) ? 'times' : 'check' ) }}" ></i>
                                            </span>
                                        </td>
                                        <td title="Created">{{$item->created}}</td>
                                        <td title="Updated">{{$item->updated}}</td>
                                        <td title="Actions">
                                            @if(isset($item->actions) && is_array($item->actions))
                                                <div class="dropdown is-hoverable is-right">
                                                    <div class="dropdown-trigger">
                                                        <button class="button is-primary is-small is-outlined" aria-haspopup="true" aria-controls="dropdown-menu">
                                                            <span class="icon">
                                                                <i class="fas fa-cogs" aria-hidden="true"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            @foreach($item->actions as $action)
                                                                <a href="{{ $action['route'] }}" title="{{ $action['name'] }}" class="dropdown-item">
                                                                    <span class="icon">
                                                                        <i class="{{ $action['icon'] }}" aria-hidden="true"></i>
                                                                    </span>

                                                                    <span>
                                                                        {{ $action['name'] }}
                                                                    </span>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection