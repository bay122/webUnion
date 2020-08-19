@extends('front.uc2.layout')
  
@section('title', 'Ministerios')

@section('main')
<section>
    <!-- Promo Block Content -->
    <div class="container g-color-black text-center g-py-100 pb-0">
        <h3 class="h1 g-font-weight-600 text-uppercase mb-2">Ministerios</h3>
        <p class="g-font-weight-300 g-font-size-22 ">Iglesia Unión Cristiana</p>
    </div>
    <!-- Promo Block Content -->
</section>
<!-- End Promo Block -->


<!-- Team Blocks v1 -->
<section class="container g-py-0">

    <!-- Figure -->
    <figure class="row flex-md-row align-items-center">
        <!-- Figure Body -->
        <div class="col-md-6 order-md-2 px-0">
            <div class="u-ns-bg-v1-bottom u-ns-bg-v1-left--md g-bg-white g-py-30 g-px-50">
                <!-- Figure Info -->
                <div class="g-mb-25">
                    <div class="g-mb-20">
                        <h4 class="h5 g-color-black g-mb-5">ADOLESCENTES</h4>
                        <em class="d-block g-font-style-normal g-font-size-11 text-uppercase g-color-primary">Ministerio</em>
                    </div>
                    <p>Tiene como misión colaborar con los padres en la evangelización de sus hijos. Para cumplir este objetivo contamos con un equipo de maestros y ayudantes capacitados que trabajan con los distintos grupos de acuerdo a sus edades y necesidades. ¡Cada edad tiene su espacio! Además, durante la predicación el día domingo los niños entre los 2 y14 años se distribuyen en clases para compartir y aprender de la Palabra de Dios. Durante el año tenemos distintas actividades recreativas, entre las cuales destacan Fiesta de la Vida y campamentos para hombres y mujeres.</p>
                </div>
                <!-- End Figure Info -->

                <!-- Figure Social Icons -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="far fa-envelope"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Figure Social Icons -->
            </div>
        </div>
        <!-- End Figure Body -->

        <!-- Figure Image -->
        <div class="col-md-6 order-md-1 px-0">
        <figure class="u-bg-overlay g-bg-adolecente-gradient-opacity-v1--after">
            <img class="w-100" src="{{ asset('uc2/img/ninos_adolescentes.jpg') }}" alt="Image Description">
            </figure>
        </div>
        <!-- End Figure Image -->
    </figure>
    <!-- End Figure -->

    <!-- Figure -->
    <figure class="row flex-md-row align-items-center">
        <!-- Figure Body -->
        <div class="col-md-6 px-0">
            <div class="u-ns-bg-v1-bottom u-ns-bg-v1-right--md g-bg-white g-py-30 g-px-50">
                <!-- Figure Info -->
                <div class="g-mb-25">
                    <div class="g-mb-20">
                        <h4 class="h5 g-color-black g-mb-5">JÓVENES INTERMEDIOS</h4>
                        <em class="d-block g-font-style-normal g-font-size-11 text-uppercase g-color-primary">Ministerio</em>
                    </div>
                    <p> Nuestro objetivo es promover que los jóvenes conozcan cada día más a Cristo a través de una relación personal con Él, que sus vidas sean transformadas por medio de la Palabra y que puedan conocer a otros creyentes.
                    </br>
                    <strong>¡Te esperamos cada viernes a las 19:45 hrs!</strong> </p>
                    <!-- Yellow Alert -->
                    <div class="alert alert-dismissible fade show g-bg-yellow rounded-0" role="alert">
                      <div class="media">
                        <span class="d-flex g-mr-10 g-mt-5">
                          <i class="icon-info g-font-size-25"></i>
                        </span>
                        <span class="media-body align-self-center">
                          <strong>Importante!</strong> Debido a la contigencia sanitaria actual, las actividades de los Jóvenes se realizarán por medio de Zoom. Siguenos en nuestras redes sociales para ver los links y horarios de las reuniones, o inscríbete en nuestra base de datos para recibir toda la información de manera personalizada. 
                          Puedes inscribirte <a href="{{ url('/jovenes/registro') }}" style="color:black">
                                              <strong>aquí</strong>
                                              <i class="icon-hotel-restaurant-002 u-line-icon-pro"></i>
                                            </a>
                        </span>
                      </div>
                    </div>
                    <!-- End Yellow Alert -->
                </div>
                <!-- End Figure Info -->

                <!-- Figure Social Icons -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" target="_blank" href="https://www.facebook.com/jovenesunioncristiana">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" target="_blank" href="https://www.youtube.com/channel/UC2ClSvB_wOWscEOh7YbojSw">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" target="_blank" href="https://www.instagram.com/jovenes.intermedios/">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Figure Social Icons -->
            </div>
        </div>
        <!-- End Figure Body -->

        <!-- Figure Image -->
        <div class="col-md-6 px-0 ">
            <figure class="u-bg-overlay g-bg-jovenes-gradient-opacity-v1--after">
                    <img class="w-100 " src="{{ asset('uc2/img/intermedios.jpg') }}" alt="Image Description">
            </figure>
        </div>
        <!-- End Figure Image -->
    </figure>
    <!-- End Figure -->

    <!-- Figure -->
    <figure class="row flex-md-row align-items-center">
        <!-- Figure Body -->
        <div class="col-md-6 order-md-2 px-0">
            <div class="u-ns-bg-v1-bottom u-ns-bg-v1-left--md g-bg-white g-py-30 g-px-50">
                <!-- Figure Info -->
                <div class="g-mb-25">
                    <div class="g-mb-20">
                        <h4 class="h5 g-color-black g-mb-5">ADULTOS JÓVENES</h4>
                        <em class="d-block g-font-style-normal g-font-size-11 text-uppercase g-color-primary">Ministerio</em>
                    </div>
                    <p>Si estás recién egresado o inmerso en el mundo laboral, te invitamos a estudiar juntos La Palabra de Dios. Conversemos acerca de las inquietudes propias de esta etapa, desde una perspectiva bíblica y centrada en Cristo. Como grupo, buscamos ser y hacer discípulos de Jesús en todos nuestros contextos.</br>
                    <i>“Ninguno tenga en poco tu juventud, sino sé ejemplo de los creyentes en palabra, conducta, amor, espíritu, fe y pureza.” (1 Timoteo 4:12)</i></p>
                </div>
                <!-- End Figure Info -->

                <!-- Figure Social Icons -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="far fa-envelope"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Figure Social Icons -->
            </div>
        </div>
        <!-- End Figure Body -->

        <!-- Figure Image -->
        <div class="col-md-6 order-md-1 px-0">
        <figure class="u-bg-overlay g-bg-adulto-gradient-opacity-v1--after">
            <img class="w-100" src="{{ asset('uc2/img/jovenes_adultos.jpg') }}" alt="Image Description">
            </figure>
        </div>
        <!-- End Figure Image -->
    </figure>
    <!-- End Figure -->

    <!-- Figure -->
    <figure class="row flex-md-row align-items-center">
        <!-- Figure Body -->
        <div class="col-md-6 px-0">
            <div class="u-ns-bg-v1-bottom u-ns-bg-v1-right--md g-bg-white g-py-30 g-px-50">
                <!-- Figure Info -->
                <div class="g-mb-25">
                    <div class="g-mb-20">
                        <h4 class="h5 g-color-black g-mb-5">Discipulado Fundamental</h4>
                        <em class="d-block g-font-style-normal g-font-size-11 text-uppercase g-color-primary">Ministerio</em>
                    </div>
                    <p>Son grupos pequeños de personas que se reúnen semanalmente con el propósito de estudiar la Biblia juntos y crecer en la comunión y la oración, aprendiendo así a ser discípulos de Cristo. Los grupos son distribuidos de acuerdo a edad y género y tienen una duración de dos años. Inscripciones los meses de Marzo y Julio. Nuestro propósito es glorificar a Dios proporcionando un espacio de acompañamiento y crecimiento en Cristo, por medio del estudio de las Escrituras y búsqueda de Dios en comunidad. ¡Esperamos que unirte a un grupo sea de mucha bendición para ti!</p>
                </div>
                <!-- End Figure Info -->

                <!-- Figure Social Icons -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="far fa-envelope"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-3">
                        <a class="u-icon-v2 u-icon-size--xs g-color-main g-bg-gray-light-v5 g-brd-gray-light-v5 g-bg-primary--hover g-color-white--hover rounded-circle" href="#!">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Figure Social Icons -->
            </div>
        </div>
        <!-- End Figure Body -->

        <!-- Figure Image -->
        <div class="col-md-6 px-0 ">
            <figure class="u-bg-overlay g-bg-dis-gradient-opacity-v1--after">
                    <img class="w-100 " src="{{ asset('uc2/img/discipulado_fundamental.jpg') }}" alt="Image Description">
            </figure>
        </div>
        <!-- End Figure Image -->
    </figure>
    <!-- End Figure -->
</br>
</section>
<!-- End Team Blocks v1 -->
@endsection