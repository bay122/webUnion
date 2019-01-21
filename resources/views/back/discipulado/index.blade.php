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
    <a class="btn btn-primary" href="{{ route('discipulado.create') }}">@lang('Nuevo Discipulado')</a>
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
                            <th>#</th>
                            <th>@lang('Moderadores')
                                <span id="moderadores" class="fa fa-sort pull-right" aria-hidden="true"></span>
                            </th>
                            <th>@lang('Cantidad Integrantes')
                                <span id="cantidad_integrantes" class="fa fa-sort pull-right" aria-hidden="true"></span>
                            </th>
                            <th>@lang('Cantidad Máxima')
                                <span id="nr_cupo_maximo" class="fa fa-sort pull-right" aria-hidden="true"></span>
                            </th>
                            <th>@lang('Cantidad Mínima')
                                <span id="nr_cupo_minimo" class="fa fa-sort pull-right" aria-hidden="true"></span>
                            </th>
                            <th>@lang('Inicio')
                                <span id="fc_inicio" class="fa fa-sort pull-right" aria-hidden="true"></span>
                            </th>
                            <th>@lang('Fin estimado')
                                <span id="fc_estimada_fin" class="fa fa-sort pull-right" aria-hidden="true"></span>
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
                            <th>@lang('Moderadores')</th>
                            <th>@lang('Cantidad Integrantes')</th>
                            <th>@lang('Cantidad Máxima')</th>
                            <th>@lang('Cantidad Mínima')</th>
                            <th>@lang('Inicio')</th>
                            <th>@lang('Fin estimado')</th>
                            <th>@lang('Creation')</th>
                            <th></th>
                            <th></th>
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
    <script src="{{ asset('adminlte/js/back.js') }}"></script>
    <script>

        var user = (function () {

            var url = '{{ route('users.index') }}'
            var swalTitle = '@lang('Really destroy user ?')'
            var confirmButtonText = '@lang('Yes')'
            var cancelButtonText = '@lang('No')'
            var errorAjax = '@lang('Looks like there is a server issue...')'

            var onReady = function () {
                $('#pagination').on('click', 'ul.pagination a', function (event) {
                    back.pagination(event, $(this), errorAjax)
                })
                $('#pannel').on('change', ':checkbox[name="seen"]', function () {
                        back.seen(url, $(this), errorAjax)
                    })
                    .on('click', 'td a.btn-danger', function (event) {
                        back.destroy(event, $(this), url, swalTitle, confirmButtonText, cancelButtonText, errorAjax)
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

        $(document).ready(user.onReady)

    </script>
@endsection