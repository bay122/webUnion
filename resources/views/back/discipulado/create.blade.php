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
            <form role="form" method="POST" action="{{ route('discipulado.store') }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">@lang('Name')</label>
                        <input type="text" class="form-control" id="name" name="name" value="" required>
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email">@lang('Email')</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group">
                        <label for="role">@lang('Role')</label>
                        <select class="form-control" name="role" id="role">
                            <option value="admin">admin</option>
                        </select>  
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
    <!-- /.col -->
</div>
<!-- /.row -->



@endsection

@section('js')
<script src="{{ asset('adminlte/js/back.js') }}"></script>

@endsection