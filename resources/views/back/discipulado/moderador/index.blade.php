@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection

@section('button')
    <a class="btn btn-primary" href="{{ route('discipulado.moderador.create', ['id_ministerio' => $id_ministerio]) }}">@lang('Nuevo Discipulador')</a>
@endsection

@section('main')

    <div class="row">
        <div class="col-md-12">
            @if ($errors->count())
                @component('back.components.alert')
                    @slot('type')
                        danger
                    @endslot
                        @lang('There is some validation issue...')
                        {!! implode('<br/>- ', $errors->all(':message')) !!}
                @endcomponent
            @endif
            @if (session('ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('ok') !!}
                @endcomponent
            @else
            	@if (session('warning'))
            		@component('back.components.alert')
	                    @slot('type')
	                        warning
	                    @endslot
	                        {!! session('warning') !!}
	                @endcomponent
            	@endif
            	@if (session('error'))
            		@component('back.components.alert')
	                    @slot('type')
	                        error
	                    @endslot
	                        {!! session('error') !!}
	                @endcomponent
            	@endif

            @endif

            <div class="box">
                <div class="box-header with-border">
                    <strong>filtros :</strong> &nbsp;
                    <div id="spinner" class="text-center"></div>
                </div>
                <div class="box-body table-responsive">
                    <table id="users" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th># @lang('Id')<span id="id_usuario" class="fa fa-sort pull-right" aria-hidden="true"></span></th>
                            <th>@lang('Nombre')
                                <span id="nombres" class="fa fa-sort pull-right" aria-hidden="true"></span>
                            </th>
                            <th>Cantidad de discipulados</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Nombre')</th>
                            <th>Cantidad de discipulados</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.discipulado.moderador.table', compact('discipulados'))
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div id="pagination" class="box-footer">
                    {{-- $links --}}
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('js')
    
@endsection