@extends('templates.main')

@section('title', 'Ministerios')

@section('content')

<div id="post-165" class="post-165 page type-page status-publish has-post-thumbnail hentry">
    <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">{{$category->name}}</span>
                    <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">EN ACCIÓN - OCTUBRE 2017</h2>
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
                            <span>EVANGELIO, AMOR Y MISERICORDIA EN ACCIÓN</span>
                        </h5>
                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12">
                            <p class="dropcap text-medium">
                                <strong>“Compartir el Evangelio y atender al prójimo es un llamado de Dios a toda la Iglesia”</strong>, afirma <strong>Luis Miguel Guzmán</strong>, quien, junto a un grupo de hombres y mujeres de Unión Cristiana, lleva adelante
                                el <strong>Ministerio de Misericordia</strong>.
                            </p>

                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                Esta labor se empezó a realizar desde los primeros años de la iglesia, procurando obedecer lo que
                                ya Dios nos ha declarado lo que es bueno, y lo que espera de nosotros: <i>Practicar la justicia, amar
                                la misericordia, y humillarnos ante Él [Miqueas 6:8]</i> y atendiendo el llamado bíblico de amar al
                                prójimo.
                            </p>
                        </div>

                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12 margin-four-bottom">
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                Aun cuando la cantidad de participantes en la congregación aumenta y las situaciones de
                                necesidad también, se hace un trabajo de hormiga, tratando de recolectar alimentos y realizando
                                actividades que vayan en función del apoyo a quien más lo requiere.
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                Luis Miguel explica que <strong>“el objetivo es servir en amor y organizadamente a quienes lo
                                necesiten; internamente, apoyando con mercadería a hermanos de la iglesia con alguna
                                dificultad económica, y externamente, a personas en la cárcel, hospitales y hogares de
                                acogida”</strong>.
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>“Y verás cómo quieren en Chile, al amigo cuando es forastero.”</strong>.
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>Una de las más recientes actividades realizadas por el Ministerio de Misericordia fue una
                                cálida recepción para los inmigrantes que han llegado a la Iglesia Unión Cristiana. Fue una
                                tarde en la que personas de diferentes nacionalidades, probaron delicias típicas chilenas,
                                fueron asesorados en temas legales y de salud, pero especialmente recibieron el abrazo
                                fraterno de una congregación que procura ser obedientes al mandamiento de Cristo, de
                                amar al prójimo como a sí misma.</strong>
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
