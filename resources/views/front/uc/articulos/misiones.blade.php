@extends('templates.main')

@section('title', 'Misiones')

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
                            <span>LA GLORIOSA MISIÓN DEL PADRE ES <br>LA GLORIOSA MISIÓN DE SUS HIJOS</span>
                        </h5>
                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12">
                            <figure class=" alignleft width-290">
                                <img alt="MISIONES" src="{{ asset('images/carrousel/misiones.jpg') }}">
                                <figcaption class="text-center">Alejandra Herrera - Lider del Ministerio de Misiones</figcaption>
                            </figure>
                            <p class="dropcap text-medium">
                                El primer equipo misionero de la Iglesia Unión Cristiana viajó en el verano del año 2001 a Quellón, Chiloé. Luego
                                de este viaje, la idea se siguió replicando cada verano. Fue el inicio de un ministerio que Dios ha venido
                                inspirando y sosteniendo en medio de esta congregación, y que es la respuesta a la inquietud de corazones que
                                arden por salir y hablar a quienes necesitan oír el evangelio de Cristo.
                            </p>

                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                Fue Débora Tabilo, actual misionera de la iglesia, en Uruguay, quien en el año 2004 organizó un grupo más
                                formal de misiones, Ministerio que hoy lidera <strong>Alejandra Herrera</strong>, y que desde hace casi 20 años ha venido fortaleciéndose y que actualmente está desarrollando 6 experiencias misioneras transculturales, y también el
                                envío de grupos para evangelización a diferentes zonas del país.
                            </p>
                        </div>

                        <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                        <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 quote margin-two-bottom xs-margin-fifteen-bottom no-padding">
                            <blockquote class="bg-gray blog-image">
                                <p class="margin-three-bottom">
                                    El conocimiento de Dios, mediante su palabra, moviliza a sus hijos a adorarle, amar al prójimo y a la misión; y
                                    es ahí donde parte el proceso
                                </p>
                                <footer class="text-uppercase text-mid-gray text-medium">Alejandra Herrera</footer>
                            </blockquote>
                        </div>
                        <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>

                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12 margin-four-bottom">
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>“El conocimiento de Dios, mediante su palabra, moviliza a sus hijos a adorarle, amar al prójimo y a la misión; y
                                es ahí donde parte el proceso”</strong>, apunta <strong>Alejandra</strong>. La salida al campo misionero parte del Espíritu Santo, que moviliza a sus hijos con inquietudes de ir a un lugar determinado, por las misiones transculturales en general o por una etnia que no conozca a Dios.
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>“Como ministerio tenemos el privilegio de reconocer la obra que Dios está haciendo en diferentes integrantes
                                de nuestra congregación. El involucramiento misional es un fruto de conocer, confiar y amar a Dios. De esta
                                manera personalmente y como iglesia lograremos entender que la gloriosa misión de nuestro Padre es
                                también la gloriosa misión de sus hijos”</strong> enfatizó Alejandra, y explicó que todos podemos ser parte conociendo
                                a los misioneros, orando por ellos y por la obra misionera, y aportando económicamente en forma alegre, tal
                                como dice la Escritura.
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
