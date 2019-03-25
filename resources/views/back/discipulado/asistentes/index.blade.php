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
	<h3>Discipulado: {{$grupo_formacion->id_grupo_formacion}}</h3>
@endsection

@section('main')

	<div class="box box-solid box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Descripcion General</h3>
			<div class="box-tools pull-right">
				<!-- Collapse Button -->
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
			<!-- /.box-tools -->
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="col-sm-6">

				<div class="row">
					<div class="col-sm-12">
						<label class="control-label">Moderador/es</label>
						<table class="table table-striped" style="border-bottom: 1px solid #efefef;">
							<tbody>
								<tr>
									<th style="width: 60px;">#</th>
									<th>Nombre</th>
								</tr>
								@foreach($grupo_formacion->moderadores as $moderador)
								<tr>
									<td><i class="fa fa-user-circle text-blue" style="font-size: font-size: 18px;"></i> {{$moderador->usuario->id_usuario}}</td>
									<td>{{$moderador->usuario->name}}</td>
								</tr>
			                    @endforeach
							</tbody>
						</table>
					</div>
				</div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="gl_nombre_tipo_grupo_formacion" class="control-label">Tipo Grupo</label>
                        <input type="text" class="form-control" value="{{ $grupo_formacion->tipo_grupo_formacion->gl_nombre }}" readonly=""/>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label for="gl_estado_cupo" class="control-label">Estado</label>
                        <div style="margin-bottom: 9px;">
                            <span class="label label-{{$estado_cupo_color}}">{{$estado_cupo}}</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <label for="gl_sexo_integrantes" class="control-label">Sexo</label>
                        <div style="margin-bottom: 9px;">
                            <span class="label label-{{$sexo_integrantes_color}}">{{ $grupo_formacion->tipo_sexo->gl_nombre }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <label for="fc_creacion" class="control-label">Creación</label>
                        <input type="text" name="fc_creacion" class="form-control" readonly="" value="{{ $grupo_formacion->created_at->formatLocalized('%d/%m/%Y')  ?? '' }}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="gl_otros_datos" class="control-label">Otros Datos</label>
                        <input type="text" class="form-control" value="{{ $grupo_formacion->json_otros_datos ?? 'Sin información' }}" readonly=""/>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="nr_integrantes" class="control-label">Total Asistentes</label>
                        <input type="text" class="form-control" readonly="" value="{{$grupo_formacion->asistentes->count()  ?? '0'}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nr_cupo_maximo" class="control-label">Máximo Asistentes</label>
                        <input type="text" class="form-control" readonly="" value="{{ $grupo_formacion->nr_cupo_maximo }}"/>
                    </div>
                    <div class="col-sm-6">
                        <label for="nr_cupo_minimo" class="control-label">Minimo de Asistentes</label>
                        <input type="text" class="form-control" readonly="" value="{{ $grupo_formacion->nr_cupo_minimo }}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="fc_estimada_inicio" class="control-label">Fecha Estimada Inicio</label>
                        <input type="text" value="{{ ($grupo_formacion->fc_estimada_inicio)?$grupo_formacion->fc_estimada_inicio->formatLocalized('%d/%m/%Y') : '' }}" class="form-control" readonly=""/>
                    </div>
                    <div class="col-sm-6">
                        <label for="fc_inicio" class="control-label">Fecha Inicio</label>
                        <input type="text" value="{{ ($grupo_formacion->fc_inicio)?$grupo_formacion->fc_inicio->formatLocalized('%d/%m/%Y') : '' }}" class="form-control" readonly=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="fc_estimada_fin" class="control-label">Fecha Estimada Fin</label>
                        <input type="text" value="{{ ($grupo_formacion->fc_estimada_fin)?$grupo_formacion->fc_estimada_fin->formatLocalized('%d/%m/%Y') : '' }}" class="form-control" readonly=""/>
                    </div>
                    <div class="col-sm-6">
                        <label for="fc_fin" class="control-label">Fecha Fin</label>
                        <input type="text" value="{{ ($grupo_formacion->fc_fin)?$grupo_formacion->fc_fin->formatLocalized('%d/%m/%Y') : '' }}" class="form-control" readonly=""/>
                    </div>
                </div>
            </div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
		</div>
		<!-- box-footer -->
	</div>
	<!-- /.box -->




	<div class="box box-solid box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Integrantes</h3>
			<div class="box-tools pull-right">
                @if(($grupo_formacion->asistentes->count() < $grupo_formacion->nr_cupo_maximo+2))
                <a class="btn btn-{{$estado_cupo_color}}" href="{{ route('discipulado.asistentes.create', [$grupo_formacion->id_grupo_formacion]) }}">
                    <span class="fa fa-user-plus"></span>
                    @lang('Agregar Integrante')
                </a>
                @else
                <a class="btn btn-{{$estado_cupo_color}} disabled" href="">
                    <span class="fa fa-user-plus"></span>
                    @lang('Agregar Integrante')
                </a>
                @endif
				
			</div>
			<!-- /.box-tools -->
		</div>
		<!-- /.box-header -->
		<div class="box-body">
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
                            <button id="exportar" class="btn btn-xs btn-primary pull-right" value="{{$grupo_formacion->id_grupo_formacion}}">
                                <i class="fa fa-download"></i>
                                @lang('Exportar a EXCEL')
                            </button>    
                            <strong>filtros :</strong> &nbsp;
                            <div id="spinner" class="text-center"></div>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="users" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('Nombre')
                                        <span id="name" class="fa fa-sort pull-right" aria-hidden="true"></span>
                                    </th>
                                    <th>@lang('Fecha Ingreso')
                                        <span id="fc_ingreso" class="fa fa-sort pull-right" aria-hidden="true"></span>
                                    </th>
                                    <th>@lang('Moderador')
                                        <span id="bo_moderador" class="fa fa-sort pull-right" aria-hidden="true"></span>
                                    </th>
                                    <th>@lang('Creation')
                                        <span id="created_at" class="fa fa-sort-desc pull-right" aria-hidden="true"></span>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('Nombre')</th>
                                    <th>@lang('Fecha Ingreso')</th>
                                    <th>@lang('Moderador')</th>
                                    <th>@lang('Creation')</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody id="pannel">
                                    @include('back.discipulado.asistentes.table', ['integrantes' => $grupo_formacion->integrantes, 'id_grupo_formacion' => $grupo_formacion->id_grupo_formacion])
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
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
		</div>
		<!-- box-footer -->
	</div>
	<!-- /.box -->

@endsection

@section('js')

    <script>

        var integrante = (function () {

            var url = '{{ route('discipulado.asistentes.index', [$grupo_formacion->id_grupo_formacion]) }}'
            //var swalTitle = '@lang('Really destroy member ?')'
            var swalTitle = 'Realmente desea eliminar a <b style="color:red;">{name}</b> de este grupo?';
            var confirmButtonText = '@lang('Yes')'
            var cancelButtonText = '@lang('No')'
            var errorAjax = '@lang('Looks like there is a server issue...')';
            var reloadOnlyTable = false;

            var onReady = function () {
                $('#pagination').on('click', 'ul.pagination a', function (event) {
                    back.pagination(event, $(this), errorAjax)
                })
                $('#pannel').on('change', ':checkbox[name="seen"]', function () {
                        back.seen(url, $(this), errorAjax)
                    })
                    .on('click', 'td a.btn-danger', function (event) {
                    	var msg = swalTitle.replace("{name}", $(event.currentTarget).data('name'));
                        back.destroy(event, $(this), url, msg, confirmButtonText, cancelButtonText, errorAjax, reloadOnlyTable)
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

        $(document).ready(integrante.onReady)

    </script>

@endsection