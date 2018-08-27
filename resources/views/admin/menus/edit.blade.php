@extends('layouts.default')

@section('content')
    <style>
        body {
            background-color: #942A57;
            margin: 0 auto;
            max-width: 760px;
        }

        html, body {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        *, *:before, *:after {
            -webkit-box-sizing: inherit;
            -moz-box-sizing: inherit;
            box-sizing: inherit;
        }

        body, input, button {
            font-family: Georgia, Helvetica;
            font-size: 17px;
            color: #ecf0f1;
        }

        h1 {
            text-align: center;
            background-color: #AC5C7E;
            margin-top: 20px;
            margin-bottom: 0;
            padding: 10px;
        }

        h3 {
            background-color: rgba(255, 255, 255, 0.2);
            border-bottom: 5px solid #A13462;
            text-align: center;
            padding: 10px;
        }

        h3 div {
            margin-bottom: 10px;
        }

        .tagline {
            position: relative;
            margin-top: 0;
        }
        .tagline-text {
            vertical-align: middle;
        }
        .__slackin {
            float: right;
            margin-left: 10px;
            vertical-align: middle;
        }

        .promo {
            margin-bottom: 0;
            font-style: italic;
            padding: 10px;
            background-color: #ff4020;
            border-bottom: 5px solid #c00;
        }

        a {
            font-weight: bold;
        }
        a,
        a:hover {
            color: #ecf0f1;
        }

        pre {
            white-space: pre-wrap;
        }

        pre code {
            color: #fff;
            font-size: 14px;
            line-height: 1.3;
        }

        label {
            display: block;
            margin-bottom: 15px;
        }

        sub {
            display: block;
            text-align: right;
            margin-top: -10px;
            font-size: 11px;
            font-style: italic;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        .parent {
            background-color: rgba(255, 255, 255, 0.2);
            margin: 50px 0;
            padding: 20px;
        }

        input {
            border: none;
            outline: none;
            background-color: #ecf0f1;
            padding: 10px;
            color: #942A57;
            border: 0;
            margin: 5px 0;
            display: block;
            width: 100%;
        }

        button {
            background-color: #ecf0f1;
            color: #942A57;
            border: 0;
            padding: 18px 12px;
            margin-left: 6px;
            cursor: pointer;
            outline: none;
        }

        button:hover {
            background-color: #e74c3c;
            color: #ecf0f1;
        }

        .gh-fork {
            position: fixed;
            top: 0;
            right: 0;
            border: 0;
        }

        /* dragula-specific example page styles */
        .wrapper {
            display: table;
        }
        .container {
            display: table-cell;
            background-color: rgba(255, 255, 255, 0.2);
            width: 50%;
        }
        .container:nth-child(odd) {
            background-color: rgba(0, 0, 0, 0.2);
        }
        /*
         * note that styling gu-mirror directly is a bad practice because it's too generic.
         * you're better off giving the draggable elements a unique class and styling that directly!
         */
        .container > div,
        .gu-mirror {
            margin: 10px;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.2);
            transition: opacity 0.4s ease-in-out;
        }
        .container > div {
            cursor: move;
            cursor: grab;
            cursor: -moz-grab;
            cursor: -webkit-grab;
        }
        .gu-mirror {
            cursor: grabbing;
            cursor: -moz-grabbing;
            cursor: -webkit-grabbing;
        }
        .container .ex-moved {
            background-color: #e74c3c;
        }
        .container.ex-over {
            background-color: rgba(255, 255, 255, 0.3);
        }
        #left-lovehandles > div,
        #right-lovehandles > div {
            cursor: initial;
        }
        .handle {
            padding: 0 5px;
            margin-right: 5px;
            background-color: rgba(0, 0, 0, 0.4);
            cursor: move;
        }
        .image-thing {
            margin: 20px 0;
            display: block;
            text-align: center;
        }
        .slack-join {
            position: absolute;
            font-weight: normal;
            font-size: 14px;
            right: 10px;
            top: 50%;
            margin-top: -8px;
            line-height: 16px;
        }

        /* Carbon */

        #carbonads {
            position: absolute;
            display: block;
            overflow: hidden;
            margin-left: -180px;
            padding: 1em;
            max-width: calc(130px + 2em);
            background-color: #aa5579;
            text-align: center;
            font-size: 12px;
            font-family: Verdana, "Helvetica Neue", Helvetica, sans-serif;
            line-height: 1.5;
        }

        #carbonads a {
            color: inherit;
            text-decoration: none;
            font-weight: 400;
            transition: color .2s ease-in-out;
        }

        #carbonads a:hover {
            color: #221c3b;
        }

        #carbonads span {
            display: block;
            overflow: hidden;
        }

        .carbon-img {
            display: block;
            margin: 0 auto 1em;
        }

        .carbon-text {
            display: block;
            margin-bottom: 1em;
        }

        .carbon-poweredby {
            display: block;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 9px;
        }

        @media only screen and (min-width: 320px) and (max-width: 960px) {
            #carbonads {
                position: relative;
                float: none;
                margin: 0 auto -2em;
                max-width: 330px;
            }
            #carbonads span {
                position: relative;
            }
            #carbonads > span {
                max-width: none;
            }
            .carbon-img {
                float: left;
                margin: 0 1em 0 0;
            }
            .carbon-text {
                float: left;
                margin-bottom: 0;
                max-width: calc(100% - 130px - 1em);
                text-align: left;
            }
            .carbon-poweredby {
                position: absolute;
                right: 0;
                bottom: 0;
                display: block;
            }
        }
    </style>
    <div class="column is-11-fullhd is-offset-1-fullhd is-12-desktop is-gapless">

        <div class="parent">
            <label for="hy">There are plenty of events along the lifetime of a drag event. Check out <a href="https://github.com/bevacqua/dragula#drakeon-events">all of them</a> in the docs!</label>
            <div class="wrapper">
                <div id="left-events" class="container">
                    <div>As soon as you start dragging an element, a <code>drag</code> event is fired</div>
                    <div>Whenever an element is cloned because <code>copy: true</code>, a <code>cloned</code> event fires</div>
                    <div>The <code>shadow</code> event fires whenever the placeholder showing where an element would be dropped is moved to a different container or position</div>
                    <div>A <code>drop</code> event is fired whenever an element is dropped anywhere other than its origin <em>(where it was initially dragged from)</em></div>
                </div>
                <div id="right-events" class="container">
                    <div>If the element gets removed from the DOM as a result of dropping outside of any containers, a <code>remove</code> event gets fired</div>
                    <div>A <code>cancel</code> event is fired when an element would be dropped onto an invalid target, but retains its original placement instead</div>
                    <div>The <code>over</code> event fires when you drag something over a container, and <code>out</code> fires when you drag it away from the container</div>
                    <div>Lastly, a <code>dragend</code> event is fired whenever a drag operation ends, regardless of whether it ends in a cancellation, removal, or drop</div>
                </div>
            </div>
        </div>
    </div>
@endsection