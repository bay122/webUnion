@extends('front.layout')
  
@section('title', 'Nosotros')

@section('main')
<div class="post-165 page type-page status-publish has-post-thumbnail hentry">
    <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">Quienes Somos</span>
                <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">VIÑA DEL MAR</h2>
            </div>
        </div>
    </section>
    
    <!--section class="margin-four-bottom xs-margin-ten-bottom"-->
    <section class="margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
        <div class="container">
            <div class="row">
                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                    <h5 class="col-sm-11 text-left title-border-right text-mid-gray font-weight-700 text-uppercase letter-spacing-1 margin-six-bottom sm-margin-four-bottom xs-margin-ten-bottom title-small xs-no-padding">
                        <span>Proposito</span>
                    </h5>

                    <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                        <figure class=" alignleft width-290">
                            <img alt="MISIÓN" src="{{ asset('images/categories/EDITORIAL.jpg') }}">
                            <figcaption class="text-center">MISIÓN</figcaption>
                        </figure>
                        <p class="dropcap text-medium">
							Somos una iglesia que busca glorificar y amar a Dios por sobre todo, amando al prójimo, siendo un cuerpo unido, enseñando la palabra de Dios y poniéndola en práctica, haciendo de esta forma discípulos de Jesucristo en nuestro país y en el mundo.
							(Mateo 22:37-40, Juan 17:20-23, Mateo 28:19-20)
                        </p>
                    </div>

                    <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                        <figure class=" alignright width-290">
                            <img alt="VISIÓN" src="{{ asset('images/categories/EDITORIAL.jpg') }}">
                            <figcaption class="text-center">VISIÓN</figcaption>
                        </figure>
                        <p class="dropcap text-medium">
							Ser una iglesia que enseña el evangelio de Cristo tanto local como globalmente, con palabras y obras, por medio de iglesias locales.
                        </p>
                    </div>

                    <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                        <figure class=" alignleft width-290">
                            <img alt="NUESTROS VALORES" src="{{ asset('images/categories/EDITORIAL.jpg') }}">
                            <figcaption class="text-center">NUESTROS VALORES</figcaption>
                        </figure>
                        <p class="dropcap text-medium">
							Consideramos fundamental en el trabajo ministerial:
							
							<ul style="text-align:justify;">
								<li>Una relación personal e íntima de deleite y confianza plena en el <b>Dios</b> Trino, a quien rendimos toda gloria.</li>
								<li>Un mensaje centrado en el <b>evangelio</b> de salvación por medio de la fe en la obra de Jesucristo, que impacta toda área del creyente y de la iglesia.</li>
								<li>Una enseñanza basada en la <b>biblia</b> como autoridad suprema, que guía todo nuestro caminar.</li>
								<li>Una dependencia de Dios permanente por medio de la <b>oración</b>.</li>
								<li>Una <b>comunión</b> profunda de amor y verdad con el cuerpo de Cristo, que es la Iglesia.</li>
								<li>Una <b>vida misional</b> consagrada a anunciar el evangelio de Cristo tanto con palabras como con obras, ya sea local, como globalmente.</li>
							</ul>
                        </p>
                    </div>

                    <p></p>
                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection