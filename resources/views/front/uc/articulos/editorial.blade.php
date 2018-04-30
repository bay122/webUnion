@extends('templates.main')

@section('title', 'Editorial')

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
                            <span>¡REVITALIZADOS CON EL EVANGELIO!</span>
                        </h5>
                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12">
                            <p class="dropcap text-medium">
                                <i>“Porque no me avergüenzo del evangelio, porque es poder de Dios para salvación a todo aquel
                                que cree” (Romanos 1:16)</i>
                            </p>

                            <p>
                                El Evangelio de Jesucristo es más que la puerta de entrada, verdaderamente constituye el camino de gozo que Dios proveyó a sus hijos para que transitaran por él. Las Buenas Nuevas de salvación traspasan e impactan cada área de nuestra vida, y eso ha
                                quedado en evidencia en estos últimos años, en los cuales el Señor nos ha concedido, como iglesia
                                local, una verdadera revitalización en su Palabra. 
                            </p>

                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                Llevamos más de 25 años de existencia y, año a año, nuestro Dios ha sido fiel en sostenernos frente a las adversidades, refrescándonos con su agua de vida eterna. No obstante, este último período ha sido especialmente revitalizador. El Espíritu Santo nos ha hecho volver a los rudimentos de la fe, nos ha llevado a cavar más hondo respecto a quién es Dios, cuál es la condición humana, la centralidad de Jesucristo, el don de la fe y el regalo máximo que constituye poder relacionarnos por la eternidad en intimidad, con la Trinidad. Estas verdades del Evangelio afectan profundamente nuestra manera de ver y vivir las circunstancias. 
                            </p>
                        </div>

                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12 margin-four-bottom">
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                No hay mayor gozo que saber que el Dios Santo ha fijado sus ojos en nosotros, personas impuras y corrompidas, enviándonos a su amado Hijo Unigénito, para que todo aquel
                                que en El cree no se pierda, sino que tenga vida eterna en Cristo. <i>“Palabra fiel es esta, y en estas cosas quiero que insistas con firmeza” (Tito 3:8)</i> decía el apóstol Pablo, pues el Evangelio es un mensaje digno de ser recordado todos los días de nuestra vida.
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
