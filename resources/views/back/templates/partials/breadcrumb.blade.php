<ol class="breadcrumb">
	@foreach ($breadcrumbs as $item)
		@if(isset($item['url']))
			<li @if ($loop->last && $item['url'] === '#') class="active" @endif>
				@if ($item['url'] !== '#')
				<a href="{{ $item['url'] }}">
					@endif
					@isset($item['icon'])
					<span class="fa fa-{{ $item['icon'] }}"></span>
					@endisset
					{{ $item['name'] }}
					@if ($item['url'] !== '#')
				</a>
				@endif
			</li>
		@else
			<li><a>-</a></li>
		@endif
	@endforeach
</ol>