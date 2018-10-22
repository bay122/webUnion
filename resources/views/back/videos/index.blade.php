@extends('back.layout')

@section('css')
<link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">

@endsection

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

            <form  class="form-horizontal" method="post" action="{{ route('videos.update', [$configuracion->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}


                <div class="box-body">
                    <div class="form-group">
                        <label for="contenido" class="col-sm-2 control-label">Embed Video</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contenido" name="contenido" value="{{ old('contenido', $configuracion->contenido) }}"
                            placeholder="<iframe width='560' height='315' src='https://www.youtube.com/embed/YhEdhOr15UM' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>">
                            <span style="font-size: 12px; color: #d43948cc;">Para videos de Livestream elegir resolución 960x540</span><br/>
                            <span style="font-size: 12px; color: #d43948cc;">Para obtener link de Youtube elegir Compartir->Incorporar con resolución 560x315</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="detalles-descripcion" class="col-sm-2 control-label">Detalles Descripción</label>
                        <div class="col-sm-10">
                            <div class="col-sm-3">
                                <label for="titulo" class="col-sm-2 control-label">Titulo</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $configuracion->titulo) }}" placeholder="Ácimos">
                            </div>
                            <div class="col-sm-3">
                                <label for="categoria" class="col-sm-2 control-label">Categoría/Versiculos</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" value="{{ old('categoria', $configuracion->categoria) }}" placeholder="1° Corintios 5:6-8">
                            </div>
                            <div class="col-sm-3">
                                <label for="fecha" class="col-sm-2 control-label">Fecha</label>
                                <input type="text" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $configuracion->fecha) }}" placeholder="25 Abril 2018">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion" class="col-sm-2 control-label">Descripción</label>

                        <div class="col-sm-10">
                            <textarea rows="5" class="form-control" id="descripcion" name="descripcion" placeholder="6 No es buena vuestra jactancia. ¿No sabéis que un poco de levadura leuda toda la masa? 7 Limpiaos, pues, de la vieja levadura, para que seáis nueva masa, sin levadura como sois; porque nuestra pascua, que es Cristo, ya fue sacrificada por nosotros. 8 Así que celebremos la fiesta, no con la vieja levadura, ni con la levadura de malicia y de maldad, sino con panes sin levadura, de sinceridad y de verdad." >{{ old('descripcion', $configuracion->descripcion) }}</textarea> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <span style="font-size: 12px; color: #d43948cc;">Para videos de transmisión en vivo elegir opción Ocultar Descripción</span>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="estado" id="optionsRadios1" value="2" {{ old('estado', $configuracion->estado) == '2' ? 'checked' : '' }}>
                                    Ocultar descripción
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="estado" id="optionsRadios2" value="1" {{ old('estado', $configuracion->estado) == '1' ? 'checked' : '' }} >
                                    Mostrar descripción
                                </label>
                            </div>
                        </div>
                    </div>

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
<script src="{{ asset('adminlte/js/back.js') }}"></script>

@endsection