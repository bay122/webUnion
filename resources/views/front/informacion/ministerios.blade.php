@extends('front.layout')
  
@section('title', 'Ministerios')

@section('main')
<div class="post-165 page type-page status-publish has-post-thumbnail hentry">
    <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">Iglesia Unión Cristiana</span>
                <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">Ministerios</h2>
            </div>
        </div>
    </section>

<!-- ----------------------------------------------------- -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    
                    <div class="tab-content margin-one-top">

                        <div role="tabpanel" class="tab-pane active" id="enseñanza">
                            <div class="row">
                                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                                    @foreach($categorias as $categoria_detalle)<div class="col-md-6 col-xs-12">
                                            <div class="toggle-button">
                                                <div class="promo-area col-xs-12 margin-bottom-30 xs-margin-six-bottom">
                                                    <div class="text-center promo-item cover-background" style="background:url({{$categoria_detalle['image']}})">
                                                        <div class="promo-border">
                                                            <p class="text-shadow text-uppercase text-extra-small letter-spacing-3 text-white promo-title padding-three-bottom">{{$categoria_detalle['title']}}</p>
                                                            <span class="text-uppercase text-black text-small alt-font letter-spacing-1">Saber Más</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="toggle-section" style="display: none;">
                                                <div class="bg-gray" style="display: inline-block;">
                                                    <!--figure class=" alignright width-290">
                                                        <img alt="Enseñanza" src="http://sitio.unioncristiana.cl/images/categories/NOTAS.jpg"/>
                                                        <figcaption class="text-center">Ministerio Enseñanza</figcaption>
                                                    </figure>-->
                                                    <div class="col-xs-11">
                                                        <p class="dropcap text-medium text-justify">
                                                            {!!$categoria_detalle['description']!!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- -------------------------------------------------------------------------------- -->
    <p></p>
    <div class="margin-ten-top separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
</div>
@endsection