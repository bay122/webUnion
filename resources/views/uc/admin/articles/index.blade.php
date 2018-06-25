@extends('admin.articles.main')

@section('page', 'Articulos')

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
                                            <a href="{{ route('admin.articles.create') }}" class="btn btn-info">Crear Nuevo Artículo</a>
                                        </div>
                                        <div class="row margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
                                            <div class="col-md-12 col-sm-12 col-xs-12 inner-scroll">
                                                <table class="table table-striped">
                                                    <thead>
                                                      <th>#ID</th>
                                                      <th>Titulo</th>
                                                      <th>Categoría</th>
                                                      <th>Acciones</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($articles as $article)
                                                            <tr>
                                                                <td>{{ $article->id }}</td>
                                                                <td>{{ $article->title }}</td>
                                                                <td>{{ $article->category_id }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning" title="Editar">
                                                                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                                                    </a>
                                                                    <a href="{{ route('admin.articles.destroy', $article->id) }}" onclick="return confirm('¿Desea eliminar el artículo {{$article->name}}?')" class="btn btn-danger" title="Eliminar">
                                                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                                                    </a>
                                                                </td>
                                                            </tr>  
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {!! $articles->render() !!}
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
