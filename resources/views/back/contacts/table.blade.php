
@foreach($contacts as $contact)
<div class="box">

                            
    <div class="box-body table-responsive">
        <table id="contacts" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Email')</th>
                <th>Ministerio</th>
                <th>@lang('Creation')</th>
                <th>@lang('Respondido')</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ ($contact->id_ministerio) ? $contact->ministerio->gl_nombre : '-'}}</td>
                    <td>{{ $contact->created_at->formatLocalized('%a %e %b %Y %R hs.') }}</td>
                    <td>{{ ($contact->bo_respondido)?'Si':'No' }}</td>
                    <td>

                        <form action="{{ route('contacts.seen', $contact->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            
                            <button  type="submit" class="btn btn-warning btn-sm btn-leido" role="button" title="@lang('Marcar como leído')">
                                <span class="fa fa-{{ ($contact->bo_leido) ?  'envelope-o' : 'envelope-open-o'}}"></span>
                            </button>
                        </form>
                    </td>
                    <td>
                    	<button  class="btn btn-success btn-sm btn_response" name="response" value="{{ $contact->id }}" role="button" title="@lang('Responder')">
                    		<span class="fa fa-reply"></span>
                    	</button>
                    </td>
                    <td>
                        <form action="{{ route('contacts.spam', $contact->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <button type="submit" class="btn  btn-sm"  role="button" title="@lang('Marcar como Spam')">
                                <span class="fa fa-ban"></span>
                            </button>
                        </form>
                    </td>
                    <td>
                         <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm" role="button" title="@lang('Destroy')">
                            <span class="fa fa-trash"></span>
                            </button>
                        </form>    
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    <div id="message" class="box-footer">
        {{ $contact->message }}
    </div>
</div>
<!-- /.box -->
@endforeach
