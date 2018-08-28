@extends('layouts.default')

@section('content')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .drag {
            display: flex;

        }

        #menu_manager > .drag-drop-area,
        #menu_final .drag-drop-area{
            border: solid 1px;
            width: 200px;
            min-height: 35px;
            margin: 15px;
            list-style-type: none;
        }
        #menu_item_drag .drag-drop-area  .draggable-item > .move{
            display: none;
        }
        /*#menu_item_drag > .drag-drop-area > .draggable-item > .move,*/
        /*#menu_item_drag > .drag-drop-area > .drag-drop-area{*/
            /*display: none;*/
        /*}*/
        /*#menu_final > .drag-drop-area > .draggable-item > .move,*/
        /*#menu_final > .drag-drop-area > .drag-drop-area{*/
            /*display: block;*/
        /*}*/

        .noselect {
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
        }

    </style>


    <div class="column is-11-fullhd is-offset-1-fullhd is-12-desktop is-gapless">
        <div class="drag columns" id="menu_manager">
            <div class="column is-4 drag-drop-area tags" id="menu_item_drag">
                @foreach($menuItems as $item)
                    <div class="tag is-primary is-large">
                        <span class="move">
                            <i class='fas fa-arrows-alt'></i>
                        </span>

                        <div class="drag-drop-area">
                            <div>
                                <span class="draggable-item" id="draggable_{{$item->id}}">
                                    <span class="move">
                                        <i class='fas fa-arrows-alt'></i>
                                    </span>
                                    {{$item->name}}
                                    <span class="edit">
                                        <i class='fas fa-edit'></i>
                                    </span>
                                    <div class="drag-drop-area item_{{$item->id}}"></div>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="drag-drop-area" id="menu_final">
                @if(isset($menuCurrent) && is_array($menuCurrent))
                    @foreach($menuCurrent as $item)
                        <div class="tag is-primary is-large">
                            <span class="move">
                                <i class='fas fa-arrows-alt'></i>
                            </span>
                            <div class="drag-drop-area">
                                <div>
                                    <span class="draggable-item" id="draggable_{{$item->id}}">
                                        <span class="move">
                                            <i class='fas fa-arrows-alt'></i>
                                        </span>
                                        {{$item->name}}

                                        <span class="edit">
                                            <i class='fas fa-edit'></i>
                                        </span>
                                    </span>
                                </div>
                                <div class="drag-drop-area">
                                    @if (isset($item->children) && is_array($item->children))
                                        @foreach($item->children as $child)
                                            <div>
                                                <span class="draggable-item" id="draggable_{{$item->id}}">
                                                    <span class="move">
                                                        <i class='fas fa-arrows-alt'></i>
                                                    </span>
                                                    {{$item->name}}
                                                    <span class="edit">
                                                        <i class='fas fa-edit'></i>
                                                    </span>
                                                </span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection