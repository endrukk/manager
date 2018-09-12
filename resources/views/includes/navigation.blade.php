<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
        Manager
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav mr-auto">
            @if (isset($menu) && is_array($menu))

                @foreach($menu as $item)
                    @if (isset($item->children) && is_array($item->children))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ $item->url }}"@if($item->target != "") target="{{$item->target}}" @endif @if($item->nofollow)rel="nofollow" @endif id="navbarDropdown_{{$item->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$item->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_{{$item->id}}">
                                @foreach($item->children as $child)
                                    <a class="dropdown-item" href="{{ $child->url }}"@if($child->target != "") target="{{$child->target}}" @endif @if($child->nofollow)rel="nofollow" @endif>
                                        {{$child->name}}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $item->url }}"@if($item->target != "") target="{{$item->target}}" @endif @if($item->nofollow)rel="nofollow"@endif >
                                {{$item->name}}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>

        @guest
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Register
                    </a>
                </li>
            </ul>
        @else

            <ul class="navbar-nav ml-auto hidden-md-down">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUserArea" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUserArea">
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        @endguest
    </div>
</nav>