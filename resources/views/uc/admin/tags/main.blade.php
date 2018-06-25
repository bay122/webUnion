@extends('templates.main')

@section('title', 'Lista de Tags')

@section('content')
    <div id="post-145" class="post-145 page type-page status-publish has-post-thumbnail hentry">
        <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center"><span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">Administrador</span>
                        <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">@yield('page', 'Tags')</h2>
                    </div>
                </div>
            </div>
        </section>
        @include('flash::message')
        <!-- INICIO CONTENT ADMIN TAGS-->
        @yield('content_admin_tags')
        <!-- FIN CONTENT ADMIN TAGS-->
    </div>

@endsection
