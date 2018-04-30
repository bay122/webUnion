@extends('admin.tags.main')

@section('page', 'Tags')

@section('content_admin_tags')
        <section class="margin-two sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="entry-content">
                            <div class="post-details-content">
                                <div class="leave-form float-none">
                                    <div class="blog-comment-form">
                                        <div class="row">
                                            <a href="{{ route('admin.tags.create') }}" class="btn btn-info">Crear Nuevo Tag</a>
                                        </div>
                                        <div class="row margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
                                            <div class="col-md-12 col-sm-12 col-xs-12 inner-scroll">
                                                <table class="table table-striped">
                                                    <thead>
                                                      <th>#ID</th>
                                                      <th>Nombre</th>
                                                      <th>Acción</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($tags as $tag)
                                                            <tr>
                                                                <td>{{ $tag->id }}</td>
                                                                <td>{{ $tag->name }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning" title="Editar">
                                                                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                                                    </a>
                                                                    <a href="{{ route('admin.tags.destroy', $tag->id) }}" onclick="return confirm('¿Desea eliminar el tag {{$tag->name}}?')" class="btn btn-danger"  title="Eliminar">
                                                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                                                    </a>
                                                                </td>
                                                            </tr>  
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {!! $tags->render() !!}
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
