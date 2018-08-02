@extends('front.layout')

@section('main')
<div class="page type-page status-publish has-post-thumbnail hentry">
    <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center"><span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">ingresar como usuario</span>
                <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">Login</h2>
            </div>
        </div>
    </section>
    <section class="margin-three sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
        <div class="container">
            <div class="row">
                <div class="entry-content">
                    @if (session('confirmation-success'))
                        @component('front.components.alert')
                            @slot('type')
                                success
                            @endslot
                            {!! session('confirmation-success') !!}
                        @endcomponent
                    @endif
                    @if (session('confirmation-danger'))
                        @component('front.components.alert')
                            @slot('type')
                                error
                            @endslot
                            {!! session('confirmation-danger') !!}
                        @endcomponent
                    @endif
                    <h3>@lang('Login')</h3>
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        @if ($errors->has('log'))
                            @component('front.components.error')
                                {{ $errors->first('log') }}
                            @endcomponent
                        @endif   
                        <input id="log" type="text" placeholder="@lang('Login')" class="input-field medium-input" name="log" value="{{ old('log') }}" required autofocus>
                        <input id="password" type="password" placeholder="@lang('Password')" class="input-field medium-input"  name="password" required>
                        <label class="add-bottom">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                            <span class="label-text">@lang('Remember me')</span>
                        </label>
                        <input class="btn btn-border btn-small text-uppercase font-weight-700 letter-spacing-1 alt-font" type="submit" value="@lang('Login')">
                        <label class="add-bottom">
                            <a href="{{ route('password.request') }}">
                                @lang('Forgot Your Password?')
                            </a><br>
                            <a href="{{ route('register') }}">
                                @lang('Not registered?')
                            </a>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
