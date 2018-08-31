@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    
@endsection

@section('main')

    <div class="row">
        <div class="col-md-12">
             <!-- right column -->
    
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
                    <input type="text" class="form-control" id="contenido" name="contenido" value="{{ old('contenido', $configuracion->contenido) }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="descripcion" class="col-sm-2 control-label">Descripción</label>

                  <div class="col-sm-10">
                  <textarea rows="5" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" >{{ old('contenido', $configuracion->descripcion) }}</textarea> 
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
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