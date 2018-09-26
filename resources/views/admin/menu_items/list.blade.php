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
                            @if($menu_items)
                                <thead>
                                    <tr>
                                        <th scope="col" title="Id">Id</th>
                                        <th scope="col" title="Name">Name</th>
                                        <th scope="col" title="Route">Route</th>
                                        <th scope="col" title="Link">Link</th>
                                        <th scope="col" title="Target">Target</th>
                                        <th scope="col" title="Nofollow">Nofollow</th>
                                        <th scope="col" title="Created">Created</th>
                                        <th scope="col" title="Updated">Updated</th>
                                        <th scope="col" title="Actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menu_items as $item)
                                    <tr>
                                        <td title="ID">{{$item->id}}</td>
                                        <td title="Name">{{$item->name}}</td>
                                        <td title="Route">{{$item->route}}</td>
                                        <td title="Link">{{$item->link}}</td>
                                        <td title="Target">{{$item->target}}</td>
                                        <td title="Nofollow">{{$item->nofollow}}</td>
                                        <td title="Created">{{$item->created_at}}</td>
                                        <td title="Updated">{{$item->updated_at}}</td>
                                        <td title="Actions">
                                            @if(isset($item->actions) && is_array($item->actions))
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="menuItem_{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="icon">
                                                            <i class="fas fa-cogs" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="menuItem_{{$item->id}}">
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