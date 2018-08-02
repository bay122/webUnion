<div class="search-wrap">
	<form role="search" method="get" class="search-form" action="{{ route('posts.search') }}">
		<label>
			<input type="search" class="search-field" placeholder="@lang('Type Your Keywords')"  name="search" autocomplete="off" required>
		</label>
		<input type="submit" class="search-submit" value="">
	</form>

	<a href="#" id="close-search" class="close-btn">Close</a>

</div> <!-- end search wrap -->