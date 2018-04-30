@extends('admin.users.main')

@section('page', 'Usuarios')

@section('content_admin_users')
        <section class="margin-two sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="entry-content">
                            <div class="post-details-content">
                                <div class="leave-form float-none">
                                    <div class="blog-comment-form">
                                        <div class="row">
                                            <a href="{{ route('admin.users.create') }}" class="btn btn-info">Crear Nuevo Usuario</a>
                                        </div>
                                        <div class="row margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
                                            <div class="col-md-12 col-sm-12 col-xs-12 inner-scroll">
                                                <table class="table table-striped">
                                                    <thead>
                                                      <th>#ID</th>
                                                      <th>Nombre</th>
                                                      <th>Email</th>
                                                      <th>Tipo</th>
                                                      <th>Acciones</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($users as $user)
                                                            <tr>
                                                                <td>{{ $user->id }}</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>@if($user->type == "admin")
                                                                        <span class="label label-success">{{ $user->type }}</span>
                                                                    @else
                                                                        <span class="label label-default">{{ $user->type }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning" title="Editar">
                                                                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                                                    </a>
                                                                    <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Desea eliminar el usuario {{$user->name}}?')" class="btn btn-danger" title="Eliminar">
                                                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                                                    </a>
                                                                </td>
                                                            </tr>  
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {!! $users->render() !!}
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
