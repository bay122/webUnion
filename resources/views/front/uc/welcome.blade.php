@extends('templates.main')

@section('title', 'Home')

@section('content')
	<section class="margin-two-bottom sm-margin-six-bottom xs-margin-twelve-bottom">
		@include('templates.partials.corrusel')
	</section>
	<section class="margin-four-bottom xs-margin-ten-bottom">
		<div class="container">
	        <div class="row">
				@foreach($categories as $category)
				<div class="promo-area col-md-4 col-sm-4 col-xs-12 margin-bottom-30 xs-margin-six-bottom">
	                <div class="text-center promo-item cover-background" style="background:url({{ asset($category->image->route) }})">
	                    <a class="promo-linking" href="{{$category->route}}" target="_self"></a>
	                    <div class="promo-border">
	                        <p class="text-shadow text-uppercase text-extra-small letter-spacing-3 text-white promo-title padding-three-bottom">{{$category->name }}</p>
	                        <span class="text-uppercase text-black text-small alt-font letter-spacing-1">{{$category->description->label}}</span>
	                    </div>
	                </div>
	            </div>
				@endforeach
	        </div>
	    </div>
	</section>
@endsection