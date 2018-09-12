@extends('layouts.default')

@section('content')


    <style type="text/css">
        /**
         * Nestable
         */
        .dd {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            max-width: 600px;
            list-style: none;
            font-size: 13px;
            line-height: 20px;
        }

        .dd-list {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .dd-list .dd-list {
            padding-left: 30px;
        }

        .dd-collapsed .dd-list {
            display: none;
        }

        .dd-item,
        .dd-empty,
        .dd-placeholder {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 20px;
            font-size: 13px;
            line-height: 20px;
        }

        .dd-handle {
            display: block;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }


        .dd-item > button {
            display: block;
            position: relative;
            cursor: pointer;
            float: left;
            width: 25px;
            height: 20px;
            margin: 5px 0;
            padding: 0;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 0;
            background: transparent;
            font-size: 12px;
            line-height: 1;
            text-align: center;
            font-weight: bold;
        }

        .dd-item > button:before {
            content: '+';
            display: block;
            position: absolute;
            width: 100%;
            text-align: center;
            text-indent: 0;
        }

        .dd-item > button[data-action="collapse"]:before {
            content: '-';
        }

        .dd-placeholder,
        .dd-empty {
            margin: 5px 0;
            padding: 0;
            min-height: 30px;
            background: #f2fbff;
            border: 1px dashed #b6bcbf;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .dd-empty {
            border: 1px dashed #bbb;
            min-height: 100px;
            background-color: #e5e5e5;
            background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image: -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image: linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }

        .dd-dragel {
            position: absolute;
            pointer-events: none;
            z-index: 9999;
        }

        .dd-dragel > .dd-item .dd-handle {
            margin-top: 0;
        }

        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
            box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
        }

        /**
         * Nestable Extras
         */
        .nestable-lists {
            display: block;
            clear: both;
            padding: 30px 0;
            width: 100%;
            border: 0;
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
        }



        @media only screen and (min-width: 700px) {
            .dd {
                float: left;
                width: 100%;
            }

            .dd + .dd {
                margin-left: 0%;
            }
        }

        .dd-hover > .dd-handle {
            background: #2ea8e5 !important;
        }

        /**
         * Nestable Draggable Handles
         */

        .dd-dragel > .dd3-item > .dd3-content {
            margin: 0;
        }

        .dd3-item > button {
            margin-left: 30px;
        }

        .dd3-handle {
            position: absolute;
            margin: 0;
            left: 0;
            top: 0;
            cursor: pointer;
            width: 30px;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .dd3-handle:before {
            content: '≡';
            display: block;
            position: absolute;
            left: 0;
            top: 3px;
            width: 100%;
            text-align: center;
            text-indent: 0;
            color: #fff;
            font-size: 20px;
            font-weight: normal;
        }

        .dd3-handle:hover {
            background: #ddd;
        }

        /**
         * Socialite
         */
        .socialite {
            display: block;
            float: left;
            height: 35px;
        }
        #nestable2 .dd-list .dd-item .dd-list .dd-item .is-large{
            font-size: 1rem;
        }
        #nestable2 > .dd-list > .dd-item > .is-primary{
            font-size: 1.25rem;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.menu.process')}}" method="post">
                        <div class="form-row">
                            <h2>Settings</h2>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <input class="form-control" name="name" type="text" placeholder="Name" value="@if( old('name') !== NULL ){{ old('name') }}@elseif(isset($menuCurrent->name)){{$menuCurrent->name}}@endif" />
                            </div>

                            <div class="form-group col-sm-6 col-xs-12">
                                <div class="form-row">
                                    <div class="col-sm-4 col-xs-12">
                                        <select class="form-control" name="role">
                                            <option value="">Select role</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-4 col-xs-12">
                                        <select class="form-control" name="type">
                                            <option value="">Select type</option>
                                            <option value="0">Admin</option>
                                            <option value="1">Front</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4 col-xs-12">
                                        <div class="custom-control custom-checkbox-lg custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="activeMenu" name="active">
                                            <label class="custom-control-label" for="activeMenu">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2 col-xs12">
                                <button type="submit" name="submitProcessMenu" id="save_menu" class="btn btn-success form-control">
                                    Save
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="menu" id="menu_order" value="" />
                        <input type="hidden" name="id" value="{{ $menuID }}" />
                        {{ csrf_field() }}

                    </form>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-4 col-xs-12">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @if(isset($menuItems))
                                @foreach($menuItems as $item)
                                    <li class="dd-item" data-id="{{$item->id}}">
                                        <div class="dd-handle badge badge-primary">
                                            <h5>
                                                {{$item->name}}
                                            </h5>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <div class="dd-empty"></div>
                            @endif
                        </ol>
                    </div>

                    <div class="col-xs-12">
                        <button id="new_menu_item" class="btn btn-success"  data-toggle="modal" data-target="#modal_nem_menu_item">
                            New menu item
                        </button>
                    </div>

                </div>

                <div class="col-sm-8 col-xs-12">
                    <div class="dd" id="nestable2">
                        @if(isset($menuCurrent) && is_array($menuCurrent))
                            <ol class="dd-list">
                                @foreach($menuCurrent as $item)
                                    <li class="dd-item" data-id="{{$item->id}}">
                                        <div class="dd-handle tag is-block is-primary is-large">Item {{$item->id}}</div>
                                        @if (isset($item->children) && is_array($item->children))
                                            <ol class="dd-list children">
                                                @foreach($item->children as $child)
                                                    <li class="dd-item" data-id="{{$child->id}}">
                                                        <div class="dd-handle is-block tag is-primary">{{$child->name}}</div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="dd-empty"></div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_nem_menu_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New menu item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="newMenuItemName" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="newMenuItemName" name="name">
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6 xs-12">
                                    <label for="selectLinkType" class="col-form-label">Link type</label>
                                    <select class="form-control" name="link_type" id="selectLinkType">
                                        <option value="">Link type</option>
                                        <option value="1">Route</option>
                                        <option value="2">Link</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 xs-12">
                                    <label for="selectUrlType" class="col-form-label">Name</label>
                                    <select class="form-control" name="url_type" id="selectUrlType">
                                        <option value="">Open</option>
                                        <option value="_blank">Blank</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newMenuItemLink" class="col-form-label">Link:</label>
                            <input type="text" class="form-control" id="newMenuItemLink" name="uri">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newMenuItemNofollow" name="nofollow">
                                <label class="custom-control-label" for="newMenuItemNofollow">
                                    Nofollow
                                </label>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">save</button>
                </div>
            </div>
        </div>
    </div>

@endsection