@extends('front.layout')

@section('main')
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/FB_IMG_1535034758934.jpg');">
			<div class="wrap-login100 p-b-30">
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
				<form class="login100-form validate-form" role="form" method="POST" action="{{ route('login') }}">
                    <div class="login100-form-avatar">
						<img src="images/logos/unionCristiana@2x-1.jpg" alt="AVATAR">
                    </div>
                    </br>
                    {{ csrf_field() }}
                        @if ($errors->has('log'))
                            @component('front.components.error')
                                {{ $errors->first('log') }}
                            @endcomponent
                        @endif   
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                        <input id="log" type="text" placeholder="@lang('Login')" class="input100" name="log" value="{{ old('log') }}" required autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100" >
							<i class="fa fa-user" style="margin-bottom: 5%;" ></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input id="password" type="password" placeholder="@lang('Password')" class="input100"  name="password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100" >
							<i class="fa fa-lock" style="margin-bottom: 5%;"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" value="@lang('Login')">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25">
                         <a href="{{ route('password.request') }}" class="txt1">
                                @lang('Forgot Your Password?')
                        </a>
					</div>

					<div class="text-center w-full">
                        <a href="{{ route('register') }}" class="txt1">
                                @lang('Not registered?')
                                <i class="fa fa-long-arrow-right"></i>
                        </a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
