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
                width: 48%;
            }

            .dd + .dd {
                margin-left: 2%;
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

    <div class="columns">
        <div class=" column is-12">
            <form action="{{route('admin.menu.process')}}" method="post">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Settings</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded">
                                <input class="input" name="name" type="text" placeholder="Name" value="@if( old('name') !== NULL ){{ old('name') }}@elseif(isset($menuCurrent->name)){{$menuCurrent->name}}@endif" />
                            </p>
                        </div>

                        <div class="field-body">
                            <div class="field is-narrow">
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="role">
                                            <option value="">Select role</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-narrow">
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="type">
                                            <option value="">Select type</option>
                                            <option value="0">Admin</option>
                                            <option value="1">Front</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-narrow">
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" name="active">
                                        <span>
                                            Active
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="field">
                            <div class="control">
                                <button type="submit" name="submitProcessMenu" id="save_menu" class="button is-success">
                                    Save
                                </button>
                            </div>
                        </div>

                    </div>
                </div>



                <input type="hidden" name="menu" id="menu_order" value="" />
                <input type="hidden" name="id" value="{{ $menuID }}" />


                {{ csrf_field() }}
            </form>
        </div>
    </div>

    <div class="columns">

        <div class="column is-4">
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    @if(isset($menuItems))
                        @foreach($menuItems as $item)
                            <li class="dd-item" data-id="{{$item->id}}">
                                <div class="dd-handle is-block tag is-primary is-large">Item {{$item->id}}</div>
                            </li>
                        @endforeach
                    @else
                        <div class="dd-empty"></div>
                    @endif
                </ol>
            </div>
        </div>

        <div class="column is-8">
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
                                                <div class="dd-handle is-block tag is-primary">Item {{$child->id}}</div>
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
    <div class="columns">
        <div class="column is-12">
            <button data-action="{{ route('admin.menu_item.process', 0) }}" data-toggle="modal_nem_menu_item" id="new_menu_item" class="button is-success modal-open">
                New menu item
            </button>
        </div>
    </div>

    <div class="modal" id="modal_nem_menu_item">
        <div class="modal-background modal-closer"></div>
        <div class="modal-card">
            <form action="{{route('admin.menu.process')}}" method="post">
                <header class="modal-card-head">
                    <p class="modal-card-title">New menu item</p>
                    <button class="delete modal-closer" aria-label="close"></button>
                </header>
                <section class="modal-card-body">

                    <div class="field">
                        <div class="control">
                            <label class="label">Name</label>
                            <input class="input" type="text" placeholder="Name">
                        </div>
                    </div>

                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <div class="select">
                                    <select name="link_type">
                                        <option value="">Link type</option>
                                        <option>Route</option>
                                        <option>Link</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <div class="select">
                                    <select name="url_type">
                                        <option value="">Open</option>
                                        <option value="_blank">Blank</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Link</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Link" value="">
                        </div>
                        {{--<p class="help is-danger">This email is invalid</p>--}}
                    </div>


                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="nofollow">
                                <span>
                                    Nofollow
                                </span>
                            </label>
                        </div>
                    </div>

                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" type="submit">Save changes</button>
                    <button class="button modal-closer">Cancel</button>
                </footer>
            </form>
        </div>
    </div>

@endsection