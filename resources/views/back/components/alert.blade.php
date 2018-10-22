<div class="alert alert-{{ $type }} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>
    	@if( $type == 'danger')
    	<span class="icon fa fa-times"></span>
    	@else
    	<span class="icon fa fa-check"></span>
    	@endif
    	{{ $slot }}
    </h4>
</div>