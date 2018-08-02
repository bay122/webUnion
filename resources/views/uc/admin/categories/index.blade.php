@extends('admin.categories.main')

@section('page', 'Categorias')

@section('content_admin_categories')
        <section class="margin-two sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="entry-content">
                            <div class="post-details-content">
                                <div class="leave-form float-none">
                                    <div class="blog-comment-form">
                                        <div class="row">
                                            <a href="{{ route('admin.categories.create') }}" class="btn btn-info">Crear Nueva Categoria</a>
                                        </div>
                                        <div class="row margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
                                            <div class="col-md-12 col-sm-12 col-xs-12 inner-scroll">
                                                <table class="table table-striped">
                                                    <thead>
                                                      <th>#ID</th>
                                                      <th>Nombre</th>
                                                      <th>Imagen ID</th>
                                                      <th>Descripcion ID</th>
                                                      <th>Acciones</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($categories as $category)
                                                            <tr>
                                                                <td>{{ $category->id }}</td>
                                                                <td>{{ $category->name }}</td>
                                                                <td>{{ $category->image_id }}</td>
                                                                <td>{{ $category->description_id }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning" title="Editar">
                                                                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                                                    </a>
                                                                    <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('¿Desea eliminar la categoría {{$category->name}}?')" class="btn btn-danger" title="Eliminar">
                                                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                                                    </a>
                                                                </td>
                                                            </tr>  
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
