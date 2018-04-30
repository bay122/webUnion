@extends('admin.categories.main')

@section('page', 'Editar Categoría '. $category->name)

@section('content_admin_categories')

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

                                                    {!! Form::open(['route' => ['admin.categories.update', $category], 'method' => 'PUT', 'files' => true]) !!}
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'Nombre Usuario') !!}
                                                            {!! Form::text('name', $category->name, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'Nombre Completo', 'required']) !!}
                                                        
                                                            {!! Form::label('descripcion', 'Descripción') !!}
                                                            {!! Form::text('descripcion', $category->description_id, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'Información de la actualidad', 'required']) !!}
                                                        
                                                            {!! Form::label('image', 'Imagen de la categoría') !!}
                                                            {!! Form::text('image', null, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'imagen', 'required']) !!}

                                                            {!! Form::file('select_image', $attributes = []); !!}
                                                        
                                                            {!! Form::submit('Confirmar', ['class' => 'btn btn-primary btn-submit']) !!}
                                                            {!! Form::link('Cancelar', route('admin.categories.index'), ['class' => 'btn btn-warning', 'style' => 'float: right; margin-right: 2%;']) !!}
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

