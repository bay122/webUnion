@extends('back.layout')



@section('main')

    <div class="row">
        <div class="col-md-12">
            @if ($errors->count())
                @component('back.components.alert')
                    @slot('type')
                        danger
                    @endslot
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
            @if (session('warn'))
                @component('back.components.alert')
                    @slot('type')
                        warning
                    @endslot
                    {!! session('warn') !!}
                @endcomponent
            @endif
            <div class="box">
                <div class="box-header">
                    <strong>@lang('Status') :</strong> &nbsp;
                    <input type="checkbox" name="new" @if(request()->new) checked @endif> @lang('New')&nbsp;
                    <div id="spinner" class="text-center"></div>
                </div>
                <div id="pannel" class="box-body">
                    @include('back.contacts.table', compact('contacts'))
                </div>
                <!-- /.box-body -->
                <div id="pagination" class="box-footer">
                    {{ $links }}
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->




    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 80%;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Responder Mensaje</h4>
            </div>
            <form action="{{ route('contacts.responder') }}" method="post"> 
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="modal-body">

                <div class="row">
        			<input type="hidden" id="id_contact" name="id_contact" value="">
	                <div class="col-md-12">
	                	<textarea id="responde_pannel" name="respuesta" placeholder="Ingrese su respuesta ..."
	                	style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
	                </div>
                </div>

            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>

    </div>
</div>

@endsection

@section('js')
    
    <script>

    var contact = (function () {

        var url = '{{ route('contacts.index') }}'
        var swalTitle = '@lang('Really destroy contact ?')'
        var confirmButtonText = '@lang('Yes')'
        var cancelButtonText = '@lang('No')'
        var errorAjax = '@lang('Looks like there is a server issue...')'

        var onReady = function () {
            $('#pagination').on('click', 'ul.pagination a', function (event) {
                back.pagination(event, $(this), errorAjax)
            })
            //$('#pannel').on('change', ':checkbox[name="seen"]', function () {
            //    back.seen(url, $(this), errorAjax)
            //})
               /* $("#pannel").on('click','td button.btn-warning',function(e){
					e.preventDefault();
                   
                   let contact=$(this).val();
                    
                    $.ajax({                        
                        type: "POST",
                        data: {"_token": "{{ csrf_token() }}","contacts": contact},
                        url: '{{ route('contacts.seen') }}',
                        success: function(response){
                            
                        }
                    });
            
                   
	            	back.seen(url, $(this), errorAjax)
				})
	            .on('click', 'td a.btn-danger', function (event) {
	                back.destroy(event, $(this), url, swalTitle, confirmButtonText, cancelButtonText, errorAjax)
	            })*/
	            $('.box-header :radio, .box-header :checkbox').click(function () {
	                back.filters(url, errorAjax)
	            })
        }

        return {
            onReady: onReady
        }

    })();

    $(document).ready(contact.onReady)

    </script>
@endsection