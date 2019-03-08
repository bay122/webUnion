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
    <a class="btn btn-primary" href="{{ route('discipulado.create') }}">
    	<span class="fa fa-users"></span>
    	@lang('Nuevo Discipulado')
    </a>
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
                    <!--table id="users" class="table table-striped table-bordered"-->
                    <!--table class="table table-hover table-responsive table-striped table-bordered dataTable no-footer" id="tabla-discipulados"-->
                    <table class="table table-hover table-responsive table-striped table-bordered dataTable no-footer" id="tabla-discipulados">
                        <thead>
                        <tr class="table_header">
                            <th colspan="5">Descripción</th>
                            <th colspan="4">Integrantes</th>
                            <th colspan="2">Fechas</th>
                            <th colspan="4">Acciones</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>@lang('Moderadores')
                                <!--span id="moderadores" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Día')
                                <!--span id="nr_dia_semana" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Horario')
                                <!--span id="hr_inicio" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Tipo')
                                <!--span id="tipo_grupo" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Sexo')
                                <!--span id="tipo_sexo" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Estado')
                                <!--span id="estado" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Total')
                                <!--span id="cantidad_integrantes" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Máx')
                                <!--span id="nr_cupo_maximo" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Inicio Estimado')
                                <!--span id="fc_inicio_estimado" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <th>@lang('Inicio')
                                <!--span id="fc_inicio" class="fa fa-sort pull-right" aria-hidden="true"></span-->
                            </th>
                            <!--th>@lang('Creation')
                                <span id="created_at" class="fa fa-sort-desc pull-right" aria-hidden="true"></span>
                            </th-->
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Moderadores')</th>
                            <th>@lang('Día')</th>
                            <th>@lang('Horario')</th>
                            <th>@lang('Tipo')</th>
                            <th>@lang('Sexo')</th>
                            <th>@lang('Estado')</th>
                            <th>@lang('Total')</th>
                            <th>@lang('Máx')</th>
                            <th>@lang('Inicio Estimado')</th>
                            <th>@lang('Inicio')</th>
                            <!--th>@lang('Creation')</th-->
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr class="table_header">
                            <th colspan="5">Descripción</th>
                            <th colspan="4">Integrantes</th>
                            <th colspan="3">Fechas</th>
                            <th colspan="4">Acciones</th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.discipulado.table', compact('discipulados'))
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
    
    <script>

        var discipulado = (function () {

            var url = '{{ route('discipulado.index') }}'
            var swalTitle = '@lang('Really destroy discipleship ?')'
            var confirmButtonText = '@lang('Yes')'
            var cancelButtonText = '@lang('No')'
            var errorAjax = '@lang('Looks like there is a server issue...')'
            var reloadOnlyTable = false;

            var onReady = function () {
                $('#pagination').on('click', 'ul.pagination a', function (event) {
                    back.pagination(event, $(this), errorAjax)
                })
                $('#pannel').on('change', ':checkbox[name="seen"]', function () {
                        back.seen(url, $(this), errorAjax)
                    })
                    .on('click', 'td a.btn-danger', function (event) {
                        back.destroy(event, $(this), url, swalTitle, confirmButtonText, cancelButtonText, errorAjax, reloadOnlyTable)
                    })
                $('th span').click(function () {
                    back.ordering(url, $(this), errorAjax)
                })
                $('.box-header :radio, .box-header :checkbox').click(function () {
                    back.filters(url, errorAjax)
                })
            }

            return {
                onReady: onReady
            }

        })()

        $(document).ready(discipulado.onReady)

    </script>
@endsection