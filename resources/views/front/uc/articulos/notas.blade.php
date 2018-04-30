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
                            <span>PREPARANDO UNA GENERACIÓN DE OBREROS APROBADOS</span>
                        </h5>
                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12">
                            <p class="dropcap text-medium">
                                El llamado y compromiso de la iglesia hoy, es el mismo que el Señor Jesucristo hizo al momento de
                                su ascensión, de hecho, fue una orden, con sentido de urgencia: <i>>“vayan y hagan discípulos de
                                todas las naciones, bautizándolos en el nombre del Padre y del Hijo y del Espíritu Santo,
                                enseñándoles a obedecer todo lo que les he mandado a ustedes…” [Mateo 28:19,20]</i>. En tal
                                sentido, y dadas las condiciones de la sociedad en la que vivimos, se hace necesario estar
                                dispuestos pero bien preparados para presentar defensa del evangelio como verdaderos testigos
                                de Cristo. Es esta premisa la que precisamente inspira en proceso de enseñanza doctrinal bíblica
                                que actualmente se lleva a cabo en la iglesia Unión Cristiana.
                            </p>

                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>“Ha sido una bendición de Dios para la iglesia el poder profundizar en el conocimiento del
                                Evangelio, disfrutar de la intimidad con Él, ya a la vez establecer una comunión cristiana entre
                                los miembros de la congregación”</strong>, afirma <strong>Nicolás Castillo</strong>, quien lleva adelante lo que hoy
                                conocemos como <strong>Programa de Capacitación Ministerial o PCM</strong>.
                            </p>
                        </div>

                        <div class="paperio-dropcap col-md-12 col-sm-12 col-xs-12 margin-four-bottom">
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>¿Cuándo y cómo surge este programa?</strong>
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                <strong>“En diciembre de 2015, se me encomendó liderar el proyecto y elaborar el material. En 2016
                                comenzamos a escribir, lo que llevó muchas horas de trabajo… en marzo contábamos con 180
                                personas inscritas”.</strong>
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                                Hoy ya se puede hablar de un sólido plan de estudio que ha sacudido mentes y corazones de
                                personas de diferentes edades que, unánimes en la fe, están profundizando en conocimientos
                                bíblicos y doctrinales, fundamentales para la vida cristiana y el quehacer ministerial.
                            </p>

                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                            Un primer grupo ya culminó la formación, que dura un año; y de la mano de Nicolás, <strong>Luis Miguel
                            Guzmán</strong> y </strong>Claudio Fuentes</strong>, uno nuevo está dando este paso necesario para enfrentar el desafío
                            de servir formalmente en un ministerio. <strong>“Necesitamos preparar a la siguiente generación que irá
                            a hacer discípulos en nuestra ciudad, país y las naciones”</strong> sostiene Nicolás, por eso es necesario
                            “profundizar en el Evangelio e intimidad con Dios”, y es lo que se espera lograr con el PCM.
                            </p>
                            <p class="text-medium no-margin text-left margin-six-bottom xs-margin-ten-bottom text-left">
                            Por tal razón en Unión Cristiana, el PCM es un requisito fundamental para el servicio formal en
                            cualquiera de sus ministerios. Es así como cada año se iniciarán al menos dos cohortes, de manera
                            que todo líder, moderador, discipulador, equipo de trabajo o maestro de niños, pueda ser parte de
                            este proceso de formación.
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