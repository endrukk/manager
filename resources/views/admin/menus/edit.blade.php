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

        .draggable-item{
            border: solid 1px;
            width: 150px;
            margin: 10px;
            padding: 5px;
        }

        .draggable-item:hover{
            cursor: pointer;
        }

        .drag-drop-area{
            border: solid 1px;
            width: 200px;
            min-height: 350px;
            margin: 15px;
            list-style-type: none;
        }

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
        <div class="drag columns">
            <div class="column is-4 drag-drop-area tags" id="menu_item_drag">
                @foreach($menuItems as $item)
                    <span class="draggable-item noselect tag is-primary is-large" id="draggable_{{$item->id}}">
                        <span class="move">
                            <i class='fas fa-arrows-alt'></i>
                        </span>
                        {{$item->name}}
                        <span class="edit">
                            <i class='fas fa-edit'></i>
                        </span>
                    </span>
                @endforeach
            </div>

            <div class="drag-drop-area" id="menu_final">

            </div>
        </div>
    </div>

@endsection