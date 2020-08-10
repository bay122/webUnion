@extends('front.uc2.layout')

@section('title', 'Login')

@section('main')

<!-- Login & Signup -->
<section class="u-bg-overlay g-bg-pos-top-center g-bg-img-hero g-bg-black-opacity-0_3--after g-py-130" style="background-image: url({{ asset('uc2/img/login.jpg') }});">
  <div class="container u-bg-overlay__inner">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-lg-8">
        <!-- Heading -->
        <h1 class="g-color-white text-uppercase mb-4">Ingreso al gestor de contenido </h1>
        <div class="d-inline-block g-width-35 g-height-2 g-bg-white mb-4"></div>
        <p class="lead g-color-white">Recuerde no compartir su cuenta con terceros.</p>
        <!-- End Heading -->
      </div>
    </div>

    <div class="row justify-content-center align-items-center no-gutters">
      <div class="col-lg-5 g-bg-white ">
        <div class="g-pa-50">
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
          <!-- Form -->
          <form role="form" method="POST" action="{{ route('login') }}">
            <h2 class="h3 g-color-black mb-4">Login</h2>
            {{ csrf_field() }} 
            <div class="mb-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text g-width-45 g-brd-right-none g-brd-black g-color-black"><i class="icon-finance-067 u-line-icon-pro"></i></span>
                    </div>
                    <input  class="form-control  g-color-black g-brd-left-none g-brd-black g-bg-transparent g-color-black g-placeholder-black g-pl-0 g-pr-15 g-py-13" 
                        id="log" 
                        name="log"
                        type="email" 
                        placeholder="Email" 
                        value="{{ old('log') }}"
                        required autocomplete="email"
                        autofocus > 
                </div>
            </div>

            <div class="g-mb-40">
                <div class="input-group rounded">
                    <div class="input-group-prepend">
                        <span class="input-group-text g-width-45 g-brd-right-none g-brd-black g-color-black"><i class="icon-communication-062 u-line-icon-pro"></i></span>
                    </div>
                    <input class="form-control  g-color-black g-brd-left-none g-brd-black g-bg-transparent g-color-black g-placeholder-black g-pl-0 g-pr-15 g-py-13" 
                    id="password" 
                    name="password" 
                    type="password"
                    placeholder="Password"
                    required autocomplete="current-password">
                </div>
            </div>

            @if(false)
            <div class="g-mb-40">
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
            </div>
            @endif

            <div class="g-mb-20">
                <style type="text/css" media="screen">
                    .red{
                        color: #dc3545;
                    }
                </style>
                @if ($errors->has('log'))
                    @component('front.components.error')
                        {{ $errors->first('log') }}
                    @endcomponent
                @endif  
            </div>

            <div class="g-mb-60">
              <button class="btn btn-md btn-block rounded text-uppercase g-py-13" type="submit" style="background: linear-gradient(143deg, rgba(242,195,157,1) 28%, rgba(148,222,166,1) 67%);">Ingresar</button>

            </div>

          </form>
          <!-- End Form -->
        </div>
      </div>


    </div>
  </div>
</section>
<!-- End Login & Signup -->
@endsection