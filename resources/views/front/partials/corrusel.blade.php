<!-- ----------------------- CARRUSEL ------------------- -->
<div class="container">
    <div class="row">
        <div class="owl-slider col-md-12 col-sm-12 col-xs-12">
            <div id="owl-slider-style-2" class="owl-slider-style-2 owl-carousel overflow-hidden paperio-feature-style2 owl-square-pagination pagination-light-style owl-next-prev-arrow-style2 owl-cursor-light slide-item-1">
            	@foreach($imagenes as $imagen)
            		@if($imagen->bo_activo)
		            	<div class="item text-center cover-background bg-image-srcset" style="background: url({{ asset($imagen->gl_path) }}) no-repeat center !important; background-size: cover !important;">
		                </div>
                	@endif
            	@endforeach


            	@if(false)
                <div class="item text-center cover-background bg-image-srcset" style="background: url({{ asset('images/carrousel/bienvenidos.jpg') }}) no-repeat center !important; background-size: cover !important;">
                    <!--div class="opacity-light bg-black overlay-layer"></div>
                    <div class="outer">
                        <div class="middle">
                            <div class="inner">
                                <div class="" style="display: inline-grid;">
                                    <p class="banner-date2 banner-date2-line margin-five-bottom xs-margin-two-bottom letter-spacing-3 text-extra-small text-uppercase featured-style-meta">
                                        <span>
                                            <a rel="category tag" class="text-white featured-style-meta-link" href="articles/editorial">Ultima noticia Editorial</a>
                                        </span>
                                    </p>
                                    <a href="articles/editorial" class="btn btn-color btn-small text-uppercase alt-font">Leer Nota
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div-->
                </div>

                <div class="item text-center cover-background bg-image-srcset" style="background: url({{ asset('images/carrousel/jovenes_intermedios.jpeg') }}) no-repeat center !important; background-size: cover !important;">
                </div>

                
                
                <div class="item text-center cover-background bg-image-srcset" style="background: url({{ asset('images/carrousel/reunion_jovenes.jpeg') }});">
                    <div class="opacity-light bg-black overlay-layer"></div>
                    <div class="outer">
                        <div class="middle">
                            <div class="inner">
                                <div class="" style="display: inline-grid;">
                                    <p class="banner-date2 banner-date2-line margin-five-bottom xs-margin-two-bottom letter-spacing-3 text-extra-small text-uppercase featured-style-meta">
                                        <span>
                                            <a rel="category tag" class="text-white featured-style-meta-link" href="articles/ministerios">Reunion de Jovenes</a>
                                        </span>
                                    </p>
                                    <span class="btn btn-color btn-small text-uppercase alt-font">
                                         Todos los viernes 19:45 hs.
                                    </span>
                                    <!--a href="articles/ministerios" class="btn btn-color btn-small text-uppercase alt-font">Leer Nota
                                        <i class="fa fa-arrow-right"></i>
                                    </a-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item text-center cover-background bg-image-srcset" style="background: url({{ asset('images/carrousel/misiones.jpg') }});">
                    <div class="opacity-light bg-black overlay-layer"></div>
                    <div class="outer">
                        <div class="middle">
                            <div class="inner">
                                <div class="" style="display: inline-grid;">
                                    <p class="banner-date2 banner-date2-line margin-five-bottom xs-margin-two-bottom letter-spacing-3 text-extra-small text-uppercase featured-style-meta">
                                        <span>
                                            <a rel="category tag" class="text-white featured-style-meta-link" href="articles/misiones">Ultima noticia Misiones</a>
                                        </span>
                                    </p>
                                    <a href="articles/misiones" class="btn btn-color btn-small text-uppercase alt-font">Leer Nota
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item text-center cover-background bg-image-srcset" style="background: url({{ asset('images/carrousel/notas.jpg') }});">
                    <div class="opacity-light bg-black overlay-layer"></div>
                    <div class="outer">
                        <div class="middle">
                            <div class="inner">
                                <div class="" style="display: inline-grid;">
                                    <p class="banner-date2 banner-date2-line margin-five-bottom xs-margin-two-bottom letter-spacing-3 text-extra-small text-uppercase featured-style-meta">
                                        <span>
                                            <a rel="category tag" class="text-white featured-style-meta-link" href="articles/notas">Ultima noticia Notas</a>
                                        </span>
                                    </p>
                                    <a href="articles/notas" class="btn btn-color btn-small text-uppercase alt-font">Leer Nota
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- ----------------------- FIN CARRUSEL ------------------- -->