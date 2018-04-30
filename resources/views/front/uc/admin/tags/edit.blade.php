@extends('admin.tags.main')

@section('page', 'Editar Tag '. $tag->name)

@section('content_admin_tags')

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
                                                 
                                                    {!! Form::open(['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'Nombre Tag') !!}
                                                            {!! Form::text('name', $tag->name, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'Tag', 'required']) !!}
                                                        
                                                            {!! Form::submit('Confirmar', ['class' => 'btn btn-primary btn-submit']) !!}
                                                            {!! Form::link('Cancelar', route('admin.tags.index'), ['class' => 'btn btn-warning', 'style' => 'float: right; margin-right: 2%;']) !!}
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

