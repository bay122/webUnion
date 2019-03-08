<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@lang('Administration')</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		@include('back.templates.partials.css')

		@php 
		$local_uuid = uniqid();
		@endphp

		<!-- BASE --> 
		<link rel="stylesheet" href="{{ asset($base_css.'back/base.css').'?'.$local_uuid  }}">

		@yield('css')

		@foreach($include_css as $path)
		<link rel="stylesheet" href="{{ asset($base_css.$path).'?'.$local_uuid }}">
		@endforeach

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<!--
	BODY TAG OPTIONS:
	=================
	Apply one or more of the following classes to get the
	desired effect
	|---------------------------------------------------------|
	| SKINS         | skin-blue                               |
	|               | skin-black                              |
	|               | skin-purple                             |
	|               | skin-yellow                             |
	|               | skin-red                                |
	|               | skin-green                              |
	|---------------------------------------------------------|
	|LAYOUT OPTIONS | fixed                                   |
	|               | layout-boxed                            |
	|               | layout-top-nav                          |
	|               | sidebar-collapse                        |
	|               | sidebar-mini                            |
	|---------------------------------------------------------|
	-->

	<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
		<div class="wrapper">

			<!-- Main Header -->
			<header class="main-header">

				<!-- Logo -->
				<a href="{{ route('admin') }}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b><span class="fa fa-fw fa-dashboard"></span></b></span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>@lang('Dashboard')</b></span>
				</a>

				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">

							<!-- Notifications Menu -->
							@if ($countNotifications)
							<li class="dropdown notifications-menu">
								<!-- Menu toggle button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>

									<span class="label label-warning">{{ $countNotifications }}</span>

								</a>
								<ul class="dropdown-menu">
									<li class="header">@lang('New notifications')</li>
									<li>
										<!-- Inner Menu: contains the notifications -->
										<ul class="menu">
											<li><!-- start notification -->
												<a href="#">
													<i class="fa fa-users text-aqua"></i> {{ $countNotifications }} @lang('new') {{ trans_choice(__('comment|comments'), $countNotifications) }}
												</a>
											</li>
											<!-- end notification -->
										</ul>
									</li>
									<li class="footer"><a href="{{ route('notifications.index', [auth()->id()]) }}">@lang('View')</a></li>
								</ul>
							</li>
							@endif

							<!-- User Account Menu -->
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- The user image in the navbar-->
									<img src="{{ Gravatar::get(auth()->user()->email) }}" class="user-image" alt="User Image">
									<!-- hidden-xs hides the username on small devices so only the image appears. -->
									<span class="hidden-xs">{{ auth()->user()->name }}</span>
								</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header">
										<img src="{{ Gravatar::get(auth()->user()->email) }}" class="img-circle" alt="User Image">
										<p>{{ auth()->user()->name }}</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-right">
											<a id="logout" href="#" class="btn btn-default btn-flat">@lang('Sign out')</a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
												{{ csrf_field() }}
											</form>
										</div>
										<div class="pull-left">
											<a id="home" href="{{url('')}}" href="#" class="btn btn-default btn-flat">@lang('Home')</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>

			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<section class="sidebar">
					<!-- Sidebar Menu -->
					<ul class="sidebar-menu">
						<!-- Optionally, you can add icons to the links -->
						<li {{ currentRouteBootstrap('admin') }}>
							<a href="{{ route('admin') }}"><i class="fa fa-fw fa-dashboard"></i> <span>@lang('Dashboard')</span></a>
						</li>

						{{-- Docs: 
								https://laravel.com/docs/5.8/blade#displaying-data 
								https://laravel.com/docs/5.8/blade#extending-blade

								//Directivas extendidas de Blade ubicadas en: AppServiceProvider
						--}}
						@admin

							@include('back.partials.treeview', [
								'icon' => 'user',
								'type' => 'user',
								'items' => [
									[
										'route' => route('users.index'),
										'command' => 'list',
										'color' => 'blue',
									],
									[
										'route' => route('users.index', ['new' => 'on']),
										'command' => 'new',
										'color' => 'yellow',
									],
								],
							])

							@include('back.partials.treeview', [
								'icon' => 'envelope',
								'type' => 'contact',
								'items' => [
									[
										'route' => route('contacts.index'),
										'command' => 'list',
										'color' => 'blue',
									],
									[
										'route' => route('contacts.index', ['new' => 'on']),
										'command' => 'new',
										'color' => 'yellow',
									],
								],
							])

							@include('back.partials.treeview', [
								'icon' => 'comment',
								'type' => 'comment',
								'items' => [
									[
										'route' => route('comments.index'),
										'command' => 'list',
										'color' => 'blue',
									],
									[
										'route' => route('comments.index', ['new' => 'on']),
										'command' => 'new',
										'color' => 'yellow',
									],
								],
							])

							<li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i> <span>@lang('Categories')</span></a></li>
							<li><a href="{{ route('videos.index') }}"><i class="fa fa-video-camera"></i> <span>@lang('Video')</span></a></li>
						@endadmin

						@redac
							@include('back.partials.treeview', [
								'icon' => 'file-text',
								'type' => 'post',
								'items' => [
									[
										'route' => route('posts.index'),
										'command' => 'list',
										'color' => 'blue',
									],
									[
										'route' => route('posts.index', ['new' => 'on']),
										'command' => 'new',
										'color' => 'yellow',
									],
									[
										'route' => route('posts.create'),
										'command' => 'create',
										'color' => 'green',
									],
								],
							])
							<li><a href="{{ route('medias.index') }}"><i class="fa fa-image"></i> <span>@lang('Medias')</span></a></li>
						@endredac

						@tripulante(false)
							@ministerio(1)
							<li class="treeview">
								<a href="#"><i class="fa fa-fw fa-users"></i> <span>@lang('Discipulados')</span>
									<span class="pull-right-container">
										<span class="fa fa-angle-left pull-right"></span>
									</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="{{ route('discipulado.index') }}"><span class="fa fa-fw fa-circle-o text-blue"></span> <span>@lang('Grupos de discipulados')</span></a></li>
									<li><a href="{{ route('discipulado.moderador.index') }}"><span class="fa fa-fw fa-circle-o text-yellow"></span> <span>@lang('Moderadores')</span></a></li>
									<!--li><a href=""><span class="fa fa-fw fa-circle-o text-green"></span> <span>@lang('Agregar Integrantes')</span></a></li-->
								</ul>
							</li>
							@endministerio

							@ministerio(15)
							<li><a href="{{ route('videos.index') }}"><i class="fa fa-video-camera"></i> <span>@lang('Video')</span></a></li>
							@endministerio
						@endtripulante

						@admin
							<li class="treeview">
								<a href="#"><i class="fa fa-fw fa-cogs"></i> <span>@lang('Mantenedores')</span>
									<span class="pull-right-container">
										<span class="fa fa-angle-left pull-right"></span>
									</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="javascript.void(0)"><span class="fa fa-fw fa-circle-o text-blue"></span> <span>@lang('Usuarios')</span></a></li>
									<li><a href="javascript.void(0)"><span class="fa fa-fw fa-circle-o text-yellow"></span> <span>@lang('Perfiles')</span></a></li>
								</ul>
							</li>
							<li><a href="{{ route('settings.edit') }}"><i class="fa fa-cog"></i> <span>@lang('Settings')</span></a></li>
						@endadmin

						@if ($countNotifications)
							<li><a href="{{ route('notifications.index', [auth()->id()]) }}"><i class="fa fa-bell"></i> <span>@lang('Notifications')</span></a></li>
						@endif

					</ul>
					<!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						{{ $title }}
						@yield('button')
					</h1>
					@include('back.templates.partials.breadcrumb')
				</section>

				<!-- Main content -->
				<section class="content">
					@yield('main')
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Main Footer -->
			<footer class="main-footer">
				<!-- Default to the left -->
				<strong>Copyright &copy; 2018 <a href="{{url('')}}">Unión Cristiana</a>.</strong> @lang('All rights reserved').
			</footer>

		</div>

		<!-- REQUIRED JS SCRIPTS -->
		@include('back.templates.partials.js')

		<!-- Vakudadir -->
		<script src="{{ asset('js/views/back/validador.js').'?'.$local_uuid }}" type="text/javascript"></script>
		<!-- BASE -->
		<script src="{{ asset('js/views/back/base.js').'?'.$local_uuid }}" type="text/javascript"></script>
		<!-- BACK -->
		<script src="{{ asset('adminlte/js/back.js').'?'.$local_uuid }}"></script>

		@yield('js')

		@foreach($include_javascript as $path)
			<script src="{{ asset($base_javascript.$path).'?'.$local_uuid}}" type="text/javascript"></script>
		@endforeach

		<!-- Optionally, you can add Slimscroll and FastClick plugins.
		Both of these plugins are recommended to enhance the
		user experience. Slimscroll is required when using the
		fixed layout. -->

		<script>
			$(function() {
				$('#logout').click(function(e) {
					e.preventDefault();
					$('#logout-form').submit()
				})
			})
		</script>
	</body>
</html>