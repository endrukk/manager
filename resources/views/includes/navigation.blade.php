<div class="bd-example is-paddingless">
    <nav class="navbar is-primary">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                Manager
            </a>
            <div class="navbar-burger burger" data-target="navMenuColorprimary-example">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="navMenuColorprimary-example" class="navbar-menu">
            <div class="navbar-start">
                @if (isset($menu))

                    @foreach($menu as $item)
                        @if (isset($item->children))
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="{{ $item->url }}"@if($item->target != "") target="{{$item->target}}" @endif @if($item->nofollow)rel="nofollow" @endif>
                                    {{$item->name}}
                                </a>
                                <div class="navbar-dropdown">
                                    @foreach($item->children as $child)
                                        <a class="navbar-item" href="{{ $child->url }}"@if($child->target != "") target="{{$child->target}}" @endif @if($child->nofollow)rel="nofollow" @endif>
                                            {{$child->name}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a class="navbar-item" href="{{ $item->url }}"@if($item->target != "") target="{{$item->target}}" @endif @if($item->nofollow)rel="nofollow" @endif>
                                {{$item->name}}
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="navbar-end">
                @guest
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <p class="control">
                                <a class="button is-primary is-outlined is-inverted" href="{{ route('login') }}">
                                    <span>Login</span>
                                </a>
                            </p>
                            <p class="control">
                                <a class="button is-primary is-inverted" href="{{ route('register') }}">
                                    <span>Register</span>
                                </a>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</div>
