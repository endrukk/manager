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
                <a class="navbar-item" href="https://bulma.io/">
                    Home
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/documentation/overview/start/">
                        Docs
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/documentation/overview/start/">
                            Overview
                        </a>
                        <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                            Modifiers
                        </a>
                        <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                            Columns
                        </a>
                        <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                            Layout
                        </a>
                        <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
                            Form
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                            Elements
                        </a>
                        <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
                            Components
                        </a>
                    </div>
                </div>
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
