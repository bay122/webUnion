@extends('admin.users.main')

@section('page', 'Crear Usuario')

@section('content_admin_users')

    @if(count($errors) > 0)
        @include('templates.partials.error_list', ['errors' => $errors])
    @endif

    <section class="margin-two sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
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
                                                 
                                                {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) /*'files' => true*/ !!}
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'Nombre Usuario') !!}
                                                            {!! Form::text('name', null, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'Nombre Completo', 'required']) !!}
                                                        
                                                            {!! Form::label('email', 'Correo Electronico') !!}
                                                            {!! Form::email('email', null, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'example@gmail.com', 'required']) !!}
                                                        
                                                            {!! Form::label('password', 'Contraseña') !!}
                                                            {!! Form::password('password', ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => '**********', 'required']) !!}

                                                            {!! Form::label('password_confirmation', 'Confirmar Contraseña') !!}
                                                            {!! Form::password('confirmacion_password', ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => '**********', 'required']) !!}
                                                        
                                                            {!! Form::label('type', 'Tipo Usuario') !!}
                                                            {!! Form::select('type', [''=>'Seleccione', 'admin'=>'Administrador', 'member'=>'Miembro'], null, ['class' => 'wpcf7-form-control-wrap input-field medium-input select-style', 'required']) !!}
                                                        
                                                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-submit']) !!}

                                                            {!! Form::link('Cancelar', route('admin.users.index'), ['class' => 'btn btn-warning', 'style' => 'float: right; margin-right: 2%;']) !!}
                                                        </div>

                                                    {!! Form::close() !!}
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

