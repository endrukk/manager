@extends('layouts.default')

@section('content')

    <div class="column">
        <div class="columns is-mobile">

            <div class="column is-6-tablet is-12-mobile is-offset-3-tablet is-gapless">


                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <h1 class="title is-3">Register</h1>

                    <div class="field">
                        <label class="label" for="name">Name</label>
                        <div class="control">
                            <input id="name" class="input" name="name" type="text" placeholder="Your name" required value="{{ old('name') }}">
                        </div>
                        @if ($errors->has('name'))
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control">
                            <input  value="{{ @old('email') }}" id="email" class="input" name="email" type="text" placeholder="how.does@emails.look" required>
                        </div>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="control">
                            <input id="password" class="input" name="password" type="password" required/>
                        </div>
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label" for="password-confirm">Confirm Password</label>
                        <div class="control">
                            <input id="password-confirm" class="input" name="password_confirmation" type="password" required />
                        </div>
                    </div>

                    <div class="field level-right">
                        <button type="submit" class="button is-primary">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
