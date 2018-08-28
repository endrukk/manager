@extends('layouts.default')

@section('content')
    <style>
        .menu-box {
            border: 1px solid #a1a1a1;
            margin: 10px;
            padding: 10px;
        }
        .menu-box ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .menu-box ul.menu-list li {
            display: block;
            margin-bottom: 5px;
            border: 1px solid #eee;
            background: #fff;
        }
        .menu-box ul.menu-list > li a {
            background: #fff;
            display: block;
            font-size: 14px;
            color: red;
            text-transform: uppercase;
            text-decoration: none;
            padding: 10px;
        }
        .menu-box ul.menu-list > li a:hover {
            cursor: move;
        }
        .menu-box ul.menu-list ul {
            margin-left: 20px;
            margin-top: 5px;
        }
        .menu-box ul.menu-list ul li a {
            color: blue;
        }
        .menu-box li.menu-highlight {
            border: 1px dashed red !important;
            background: #f5f5f5;
        }

    </style>


    <div class="column is-11-fullhd is-offset-1-fullhd is-12-desktop is-gapless">
        <div class="drag columns" id="menu_manager">
            <div class="column is-4 drag-drop-area tags" id="menu_item_drag">
                <ul class="menu-list sortable">
                    @foreach($menuItems as $item)
                        <li>
                            <span>{{$item->name}}</span>
                            <ul class="submenu-list"></ul>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="drag-drop-area column is-8 drag-drop-area" id="menu_final">
                @if(isset($menuCurrent) && is_array($menuCurrent))
                    <ul class="menu-list sortable">
                        @foreach($menuCurrent as $item)
                            <li>
                                <span>{{$item->name}}</span>
                                <ul class="submenu-list">
                                    @if (isset($item->children) && is_array($item->children))
                                        @foreach($item->children as $child)
                                            <li>
                                                <span>{{$item->name}}</span>
                                                <ul class="submenu-list"></ul>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

@endsection