@extends('templates.main')

@section('title', 'Notas')

@section('content')

<div id="post-165" class="post-165 page type-page status-publish has-post-thumbnail hentry">
    <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">{{$category->name}}</span>
                    <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">OCTUBRE 2017</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12 padding-right-35 sm-padding-right-15 sm-margin-six-bottom xs-margin-ten-bottom">
                    <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12  no-padding">
                        <h5 class="text-left title-border-right text-mid-gray font-weight-700 text-uppercase letter-spacing-1 margin-six-bottom sm-margin-four-bottom xs-margin-ten-bottom title-small xs-no-padding">
                            <span>CAPACES DE CUMPLIR LA MISIÓN</span>
                        </h5>
                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12">
                            <p class="dropcap text-medium">
                                La Biblia señala como prácticas básicas de la iglesia, el estudio de la Palabra, la oración, la
                                comunión entre hermanos y la predicación del evangelio. Para inculcar en Unión Cristiana el
                                sentido de iglesia como cuerpo de Cristo, para luego llevar Su mensaje, fue implementado el
                                <strong>Ministerio Estudio Bíblico Misional</strong>, el cual se basa en 4 pilares fundamentales señalados en
                                las Escrituras: Estudio de la Palabra de Dios, Oración, Comunión entre los hermanos y
                                Predicación del evangelio. 
                                <i>(Hechos 2:42, Mateo 22:35-38, 28:18-20)</i>
                            </p>

                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                El EBM está diseñado en conjunto por el cuerpo de Ancianos de Unión Cristiana junto a la
                                directiva de este ministerio, que en la actualidad lidera <strong>Brian O’Shee</strong>. Su desarrollo se basa en
                                sesiones semanalmente en grupos de hasta 16 personas, a su vez, cada grupo realiza salidas
                                mensuales para predicar el evangelio y practicar misericordia en medio de nuestra comunidad.
                            </p>
                        </div>

                        <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                        <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 quote margin-two-bottom xs-margin-fifteen-bottom no-padding">
                            <blockquote class="bg-gray blog-image">
                                <p class="margin-three-bottom">
                                    Necesitamos generar espacios para cumplir de la mejor manera posible la misión que
                                    tenemos como iglesia y que estas instancias sean en comunión, como cuerpo.
                                </p>
                                <footer class="text-uppercase text-mid-gray text-medium">Brian O’Shee</footer>
                            </blockquote>
                        </div>
                        <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>

                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12 margin-four-bottom">
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>“Necesitamos generar espacios para cumplir de la mejor manera posible la misión que
                                tenemos como iglesia y que estas instancias sean en comunión, como cuerpo”</strong>, enfatiza
                                Brian, al referirse a este programa de estudio en el que pueden participar los miembros de la
                                congregación que hayan culminado el discipulado fundamental, pero que a diferencia del
                                discipulado y el Programa de Capacitación Ministerial, no tiene límite de tiempo, sino que es
                                un estudio continuo de un libro completo de la biblia, mediante el método inductivo.
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>A futuro se espera que más personas puedan estar insertas en el EBM y que la iglesia en
                                general se empape de estos 4 pilares</strong>, caminando hacia la madurez cristiana como una
                                consecuencia de vida de lo que Cristo ha hecho en nosotros como individuos y como iglesia.
                            </p>
                        </div>
                        <p></p>
                        <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    </section>
</div>
@include('templates.partials.related_articles')

<!--div class="content">
    <div class="title">
        { {$articleSelected->title}}
    </div>
    <hr>
    <div class="">
    { {$articleSelected->content}}    
    </div>
    <hr>
    <div>{ {$articleSelected->category->name}} | @ foreach($articleSelected->tags as $tag){ {$tag->name}} | @ endforeach</div>
</div-->
@endsection