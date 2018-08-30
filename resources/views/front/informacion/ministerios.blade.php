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
                    <ul class="nav nav-tabs-uc" role="tablist" style="display: -webkit-box;">
                        <li role="presentation" class="active">
                            <a href="#enseñanza" aria-controls="enseñanza" role="tab" data-toggle="tab">Enseñanza</a>
                        </li>
                        <li role="presentation">
                            <a href="#familia" aria-controls="familia" role="tab" data-toggle="tab">Familia</a>
                        </li>
                        <li role="presentation">
                            <a href="#misiones" aria-controls="misiones" role="tab" data-toggle="tab">Misiones</a>
                        </li>
                        <li role="presentation">
                            <a href="#transversales" aria-controls="transversales" role="tab" data-toggle="tab">Transversales</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" style="background: #f7f7f7;">
                        <div role="tabpanel" class="tab-pane active" id="enseñanza">
                            <!--div class="row"-->
                                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                                    @foreach($categorias[1] as $categoria_detalle) 
                                        @if (false)
                                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">       
                                                    <figure>
                                                        <img alt="{{$categoria_detalle->name }}" src="{{ asset($categoria_detalle->image->route) }}" class="img-responsive">
                                                        <figcaption class="text-center">{{$categoria_detalle->title}}</figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <p class="dropcap text-medium">
                                                        {!!$categoria_detalle->description!!}
                                                    </p>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                        @endif
                                        <figure>
                                            <img alt="{{$categoria_detalle->name }}" src="{{ asset($categoria_detalle->image->route) }}" class="img-responsive">
                                            <figcaption class="text-center">{{$categoria_detalle->title}}</figcaption>
                                        </figure>
                                        <p class="dropcap text-medium">
                                            {!!$categoria_detalle->description!!}
                                        </p>
                                        <br><br>
                                        <p></p>
                                        <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                                    @endforeach
                                    
                                </div>
                            <!--/div-->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="familia">
                            <div class="row">
                                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                                    @foreach($categorias[0] as $categoria_detalle)             
                                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">       
                                                    <figure>
                                                        <img alt="{{$categoria_detalle->name }}" src="{{ asset($categoria_detalle->image->route) }}" class="img-responsive">
                                                        <figcaption class="text-center">{{$categoria_detalle->title}}</figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <p class="dropcap text-medium">
                                                        {!!$categoria_detalle->description!!}
                                                    </p>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                    @endforeach
                                    
                                    <p></p>
                                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="misiones">
                            <div class="row">
                                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                                    @foreach($categorias[2] as $categoria_detalle)             
                                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">       
                                                    <figure>
                                                        <img alt="{{$categoria_detalle->name }}" src="{{ asset($categoria_detalle->image->route) }}" class="img-responsive">
                                                        <figcaption class="text-center">{{$categoria_detalle->title}}</figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <p class="dropcap text-medium">
                                                        {!!$categoria_detalle->description!!}
                                                    </p>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                    @endforeach
                                    
                                    <p></p>
                                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="transversales">
                            <div class="row">
                                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <!--div>
                                        <h5 class="col-sm-11 text-left title-border-right text-mid-gray font-weight-700 text-uppercase letter-spacing-1 margin-six-bottom sm-margin-four-bottom xs-margin-ten-bottom title-small xs-no-padding">
                                            <span>FAMILIARES</span>
                                        </h5>
                                    </div-->
                                    @foreach($categorias[3] as $categoria_detalle)             
                                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">       
                                                    <figure>
                                                        <img alt="{{$categoria_detalle->name }}" src="{{ asset($categoria_detalle->image->route) }}" class="img-responsive">
                                                        <figcaption class="text-center">{{$categoria_detalle->title}}</figcaption>
                                                    </figure>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <p class="dropcap text-medium">
                                                        {!!$categoria_detalle->description!!}
                                                    </p>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                    @endforeach
                                    
                                    <p></p>
                                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
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