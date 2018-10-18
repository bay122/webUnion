@extends('front.layout')

@section('title', 'Contacto')

@section('main')
    <div class="page type-page status-publish has-post-thumbnail hentry">
        <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
            <div class="container-fluid">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center"><span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">Cómo Encontrarnos</span>
                    <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">Contacto</h2>
                </div>
            </div>
        </section>
        <section class="margin-three sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="entry-content">
                            <div class="post-details-content">
                                <div class="leave-form fl-left">
                                    <div class="blog-comment-form">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                                <div class="col-md-4 col-sm-4 col-xs-12 margin-four-bottom text-center">
                                                    <div class="col-xs-12 no-padding margin-bottom-10">
                                                        <i class="fa fa-map-marker title-larger text-gray"></i>
                                                    </div>
                                                    <div class="col-xs-12 no-padding">
                                                        <span class=" text-uppercase alt-font text-black">Visítanos</span>
                                                        </p>
                                                        <p class="text-medium no-margin">
                                                            Arlegui y Etchever, Viña del Mar, <br /> Quinta Región de Valparaíso, Chile.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 margin-four-bottom text-center">
                                                    <div class="col-xs-12 no-padding margin-bottom-10">
                                                        <i class="fa fa-envelope-o title-larger text-gray"></i>
                                                    </div>
                                                    <div class="col-xs-12 no-padding">
                                                        <span class=" text-uppercase alt-font text-black">Escríbenos</span>
                                                        </p>
                                                        <div class="text-medium no-margin">
                                                            <a class="gray-text" href="mailto:sales@domain.com">contacto@unioncristiana.com</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 margin-four-bottom text-center">
                                                    <div class="col-xs-12 no-padding margin-bottom-10">
                                                        <i class="fa fa-mobile title-larger text-gray"></i>
                                                    </div>
                                                    <div class="col-xs-12 no-padding">
                                                        <span class="text-uppercase alt-font text-black">Llámanos</span>
                                                        </p>
                                                        <p class="text-medium no-margin">+56 (32) 271 0953</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 map  margin-four-bottom"> 
                                                <iframe height="313" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6690.383921018448!2d-71.5570941!3d-33.0250728!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689dde23ce5bc85%3A0x1d6ec5c1fd013bfd!2sIglesia+Uni%C3%B3n+Cristiana+de+Vi%C3%B1a+del+Mar!5e0!3m2!1ses-419!2scl!4v1500385509745" style="pointer-events: none;" id="map_canvas1" class="width-100">
                                                </iframe>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div role="form" class="wpcf7" id="wpcf7-f4-p145-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                    
                                                    @if (session('ok'))
                                                        @component('front.components.alert')
                                                            @slot('type')
                                                                success
                                                            @endslot
                                                            {!! session('ok') !!}
                                                        @endcomponent
                                                    @endif
                                                    <form action="{{ route('contacts.store') }}" method="post">
                                                        <div style="display: none;">
                                                            <input type="hidden" name="locale" value="es_ES"/>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                {{ csrf_field() }}
                                                                @if ($errors->has('name'))
                                                                    @component('front.components.error')
                                                                        {{ $errors->first('name') }}
                                                                    @endcomponent
                                                                @endif 
                                                                <span class="your-name">
                                                                    <input id="name" placeholder="@lang('Your name')" type="text" size="40" class="input-field medium-input" 
                                                                    aria-required="true" aria-invalid="false"
                                                                    name="name" value="{{ old('name') }}" required autofocus>
                                                                </span>
                                                                @if ($errors->has('email'))
                                                                    @component('front.components.error')
                                                                        {{ $errors->first('email') }}
                                                                    @endcomponent
                                                                @endif 
                                                                <span class="your-email">
                                                                    <input id="email" placeholder="@lang('Your email')" size="40" class="input-field medium-input" 
                                                                    aria-required="true" aria-invalid="false"
                                                                    type="email"  name="email" value="{{ old('email') }}" required>
                                                                </span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                @if ($errors->has('message'))
                                                                    @component('front.components.error')
                                                                        {{ $errors->first('message') }}
                                                                    @endcomponent
                                                                @endif 
                                                                
                                                                <span class="your-comment">
                                                                    <textarea name="message" id="message" cols="40" rows="4" class="input-textarea medium-input" aria-invalid="false"
                                                                     placeholder="@lang('Your message')" ></textarea>
                                                                </span>

                                                                <input type="submit" value="Enviar" class="btn btn-border btn-small text-uppercase font-weight-700 letter-spacing-1 alt-font"/>
                                                            </div>
                                                        </div>
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
    </div>

    @include('uc.templates.partials.suscribe_socials')
@endsection
