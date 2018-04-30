@extends('admin.articles.main')

@section('page', 'Editar Artículo '. $article->name)

@section('content_admin_articles')
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
                                                 
                                                {!! Form::open(['route' => ['admin.articles.update', $article], 'method' => 'PUT']) /*'files' => true*/ !!}
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'Titulo') !!}
                                                            {!! Form::text('name', $article->title, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'Titulo artículo', 'required']) !!}
                                                        
                                                            {!! Form::label('content', 'Contenido') !!}
                                                            {!! Form::textarea('content', $article->content, ['class' => 'wpcf7-form-control-wrap input-field medium-input', 'placeholder' => 'Contenido del artículo', 'required']) !!}

                                                            {!! Form::label('tags', 'Tags') !!}

                                                            {!! Form::label('quotes', 'Citas') !!}

                                                            {!! Form::label('category', 'Categoría') !!}
                                                        
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

