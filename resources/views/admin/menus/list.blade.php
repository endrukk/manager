@extends('layouts.default')

@section('content')
    <div class="column is-11-fullhd is-offset-1-fullhd is-12-desktop is-gapless">
        <table class="table" style="width: 100%">
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
                        <th title="Actions">Actions</th>
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
@endsection