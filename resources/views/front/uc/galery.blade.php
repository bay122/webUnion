@extends('templates.main')

@section('title', $category->name)

@section('content')
    <div id="post-98" class="post-98 post type-post status-publish format-gallery has-post-thumbnail hentry category-all-news-magazine category-business-news category-grid-four-column category-list-no-sidebar category-sidebar-left category-sidebar-right category-grid-three-column category-grid-two-column category-uncategorized category-list-with-sidebar tag-broadcast tag-journalism tag-magazine tag-news tag-report post_format-post-format-gallery">
        
        <section class="page-title border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2 class="title-small font-weight-700 text-uppercase text-mid-gray blog-headline entry-title blog-single-page-title no-margin-bottom">Aniversario 2017</h2>
                        <ul class="text-extra-small text-uppercase alt-font blog-single-page-meta">
                            <li><a rel="category tag" class="text-link-light-gray blog-single-page-meta-link" href="{{ url('') }}">Celebración 20° Aniversario</a></li>
                            <li class="published"><a class="text-link-light-gray blog-single-page-meta-link" href={{ url('') }}>Agosto 11, 2017</a></li>
                            <li><a class="text-link-light-gray blog-single-page-meta-link" href={{ url('') }}>Union Cristiana</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        @include('templates.partials.sitemap', ['category' => "galeria", 'categoryName' => "Galería", 'article' => "Album Aniversario 2017"])

        <section class="margin-five no-margin-lr sm-margin-eight-top xs-margin-twelve-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12 padding-right-35 sm-padding-right-15 sm-margin-six-bottom xs-margin-ten-bottom">
                        <div class="gallery-three-column gutter post-popup-gallery grid-cursor-light margin-four-bottom sm-margin-five-bottom xs-margin-five-bottom">
                            <ul class="grid-gallery">
                                <li><a class="gallery-img-hover" href="{{ asset('images/02/fashion-16.jpg') }}"><img src="{{ asset('images/02/fashion-16.jpg') }}" width="1170" height="771" alt="" srcset="{{ asset('images/02/fashion-16.jpg') }} 1170w, {{ asset('images/02/fashion-16-420x277.jpg') }} 420w, {{ asset('images/02/fashion-16-768x506.jpg') }} 768w, {{ asset('images/02/fashion-16-1024x675.jpg') }} 1024w, {{ asset('images/02/fashion-16-81x53.jpg') }} 81w" /></a></li>
                                <li><a class="gallery-img-hover" href="{{ asset('images/03/fashion-11.jpg') }}"><img src="{{ asset('images/03/fashion-11.jpg') }}" width="1170" height="771" alt="" srcset="{{ asset('images/03/fashion-11.jpg') }} 1170w, {{ asset('images/03/fashion-11-420x277.jpg') }} 420w, {{ asset('images/03/fashion-11-768x506.jpg') }} 768w, {{ asset('images/03/fashion-11-1024x675.jpg') }} 1024w, {{ asset('images/03/fashion-11-81x53.jpg') }} 81w" /></a></li>
                                <li><a class="gallery-img-hover" href="{{ asset('images/03/fashion-06.jpg') }}"><img src="{{ asset('images/03/fashion-06.jpg') }}" width="1170" height="771" alt="" srcset="{{ asset('images/03/fashion-06.jpg') }} 1170w, {{ asset('images/03/fashion-06-420x277.jpg') }} 420w, {{ asset('images/03/fashion-06-768x506.jpg') }} 768w, {{ asset('images/03/fashion-06-1024x675.jpg') }} 1024w, {{ asset('images/03/fashion-06-81x53.jpg') }} 81w" /></a></li>
                                <li><a class="gallery-img-hover" href="{{ asset('images/03/fashion-04.jpg') }}"><img src="{{ asset('images/03/fashion-04.jpg') }}" width="1170" height="771" alt="" srcset="{{ asset('images/03/fashion-04.jpg') }} 1170w, {{ asset('images/03/fashion-04-420x277.jpg') }} 420w, {{ asset('images/03/fashion-04-768x506.jpg') }} 768w, {{ asset('images/03/fashion-04-1024x675.jpg') }} 1024w, {{ asset('images/03/fashion-04-81x53.jpg') }} 81w" /></a></li>
                                <li><a class="gallery-img-hover" href="{{ asset('images/02/fashion-22.jpg') }}"><img src="{{ asset('images/02/fashion-22.jpg') }}" width="1170" height="771" alt="" srcset="{{ asset('images/02/fashion-22.jpg') }} 1170w, {{ asset('images/02/fashion-22-420x277.jpg') }} 420w, {{ asset('images/02/fashion-22-768x506.jpg') }} 768w, {{ asset('images/02/fashion-22-1024x675.jpg') }} 1024w, {{ asset('images/02/fashion-22-81x53.jpg') }} 81w" /></a></li>
                                <li><a class="gallery-img-hover" href="{{ asset('images/03/fashion-15.jpg') }}"><img src="{{ asset('images/03/fashion-15.jpg') }}" width="1170" height="771" alt="" srcset="{{ asset('images/03/fashion-15.jpg') }} 1170w, {{ asset('images/03/fashion-15-420x277.jpg') }} 420w, {{ asset('images/03/fashion-15-768x506.jpg') }} 768w, {{ asset('images/03/fashion-15-1024x675.jpg') }} 1024w, {{ asset('images/03/fashion-15-81x53.jpg') }} 81w" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('templates.partials.suscribe_socials')
@endsection
