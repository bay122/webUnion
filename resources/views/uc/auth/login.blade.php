@extends('layouts.app')

@section('content_login')
<section class="margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="entry-content">
                            <div class="post-details-content">
                                <div class="leave-form float-none">
                                    <div class="blog-comment-form">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div role="form" class="wpcf7" id="wpcf7-f4-p145-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>


                                                    <form class="form-horizontal wpcf7-form" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                                                        {{ csrf_field() }}

                                                        <div class="row">

                                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                                <div class="col-md-6">
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <input id="email" type="email" class="form-control wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email input-field medium-input" name="email" value="{{ old('email') }}" type="email" aria-required="true" aria-invalid="false" placeholder="Email" required autofocus>
                                                                    </span>
                                                                    @if ($errors->has('email'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                <label for="password" class="col-md-4 control-label">Password</label>

                                                                <div class="col-md-6">
                                                                    <span class="wpcf7-form-control-wrap your-email">
                                                                        <input id="password" type="password" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email input-field medium-input form-control" name="password" aria-required="true" aria-invalid="false" placeholder="Password" required>
                                                                    </span>

                                                                    @if ($errors->has('password'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-6 col-md-offset-4">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="webkit-appearance: normal;"> Remember Me
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-8 col-md-offset-4">
                                                                    <button type="submit" class="btn btn-primary wpcf7-form-control wpcf7-submit btn btn-border btn-small text-uppercase font-weight-700 letter-spacing-1 alt-font">
                                                                        Login
                                                                    </button>

                                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                        Forgot Your Password?
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                    

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
