@extends('back.layout')

@section('css')
<link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            @if (session('user-updated'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('user-updated') !!}
                @endcomponent
            @endif
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
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('discipulado.moderador.update', [$discipulador->id_grupo_formacion_usuario]) }}">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="box-body">
                        <input type="hidden" id="ministerio" name="ministerio" value="{{ $discipulador->grupo_formacion->id_ministerio }}">

                        <div class="form-group">
                            <label for="role">@lang('ministerio') *</label>
                            <select class="form-control" name="ministerio" id="ministerio">
                                <option value="discipulado">discipulado</option>
                            </select>  
                        </div>

                        <div class="form-check {{ $errors->has('bo_moderador') ? 'has-error' : '' }}">
                            <input type="checkbox" class="form-check-input" id="bo_moderador" name="bo_moderador" {{ (old('bo_moderador',$discipulador->bo_moderador)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleCheck1">@lang('Es Moderador')</label>
                            {!! $errors->first('bo_moderador', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
@endsection

