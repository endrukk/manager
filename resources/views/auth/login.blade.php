@extends('layouts.default')

@section('content')
    <div class="column">
        <div class="columns is-mobile">

            <div class="column is-6-tablet is-12-mobile is-offset-3-tablet is-gapless">


                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <h1 class="title is-3">Login</h1>

                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control">
                            <input id="email" class="input" type="text" name="email" placeholder="how.does@emails.look" required>
                        </div>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="control">
                            <input id="password" class="input" type="password" name="password" required/>
                        </div>
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <div class="control level">
                            <label class="checkbox level-left" for="remember">
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Remember Me
                            </label>
                            <div class="level-right">
                                <button type="submit" class="button is-primary">Login</button>
                            </div>
                        </div>
                    </div>


                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
