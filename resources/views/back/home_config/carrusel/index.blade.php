@extends('back.layout')

@section('main')

<div class="row">
    <div class="col-md-12">
        <!-- right column -->

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
        @endif

        <!-- Horizontal Form -->
        <div class="box box-info">

            <!-- /.box-header -->
            <!-- form start -->

            <form  class="form-horizontal" method="post" action="{{ route('home_config.carrusel.actualizar_imagenes') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}


                <div class="box-body">
                	@foreach($imagenes as $imagen)
                    	@if($imagen->bo_activo)
                    		<div class="form-group" id="current_img_carrusel{{$imagen->id_imagen}}" >
                    			<input type="hidden" id="mostrar_img_carrusel{{$imagen->id_imagen}}" name="mostrar_img_carrusel{{$imagen->id_imagen}}" value="true">
				        		<img src="{{ asset($imagen->gl_path) }}" width="10%">				        		
				        		<b>{{$imagen->gl_nombre}}</b>
				        		<button class="btn btn-danger btn-xs" onclick="quitarFoto({{$imagen->id_imagen}})" role="button" type="button" title="@lang('Destroy')">
					                <span class="fa fa-remove"></span>
					            </button>
			        		</div>
                    	@endif
	                    <div class="form-group" id="contenedor_current_img_carrusel{{$imagen->id_imagen}}" style="{{($imagen->bo_activo)?'display:none;':''}}">
	                		<label for="img_carrusel[{{$imagen->id_imagen}}]" class="col-sm-2 control-label">Imagen Carrusel {{$imagen->id_imagen}}</label>
	                		<div class="col-sm-10">
	                			<input type="file" id="img_carrusel[{{$imagen->id_imagen}}]" name="img_carrusel[{{$imagen->id_imagen}}]">
	                			<p class="help-block">Seleccione la imagen que desea que aparecerá en la {{$imagen->id_imagen}}° posición del carrusel.</p>
	                		</div>
	                	</div>
                	@endforeach
                </div>
                <!-- /.box-body -->

                <div class="box-footer"> 
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">            
                            <button type="submit" class="btn btn-info pull-right">Actualizar</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>

        </div>
        <!-- /.box -->



    </div>
    <!-- /.col -->
</div>
<!-- /.row -->



@endsection

@section('js')


@endsection