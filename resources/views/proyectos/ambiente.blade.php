@extends('layouts.main')
@section('title', 'Medio Ambiente')

@section('content')
    
    
<section class="section-ambientales">
    <div class="container container-academicos">
        <div class="row row-titulo-academicos">
            <div class="col-xs-2 col-md-4">
                <a href="{{url('proyectos')}}">
                    <img src="{{asset('images/flecha_atras.png')}}" alt="" class="img-responsive flecha-atras">
                </a>
            </div>
            <div class="col-xs-8 col-md-4">
                <p class="titulo-academicos">MEDIO AMBIENTE</p>
            </div>
        </div>
    </div>
</section>


<section class="proyectos-grid">
    <div class="row equal-height-cols row-proyectos-academicos no-pad2">
        <div class="col-md-6 academicos-grid-img1 no-pad">
            <div class="ambiental-grid2-img1"></div>
{{-- 
            <?=Slick::widget([
                'items' => [
                    '<div class="ambiental-grid2-img1"></div>',
                    '<div class="ambiental-grid2-img2"></div>',
                    '<div class="ambiental-grid2-img3"></div>',
                ],

                'clientOptions' => [
                    'autoplay' => true,
                    'dots'     => true,
                ],

            ]); ?>
             --}}
        </div>
        <div class="col-md-6 ambientales-grid-img1 no-pad desk">
            <div class="contenedor-texto">
                <p class="ambiental-grid-titulo1">REFORESTACIÓN</p>
                <p class="academico-grid-texto1">El Medio Ambiente es uno de los pilares principales de Iniciativa Xala, por lo mismo, en conjunto con la comunidad de José María Morelos, hicimos un evento de reforestación en el cual limpiamos y plantamos más de 70 árboles en uno de los andadores más importantes de la localidad.</p>
            </div>
        </div>
        <div class="col-xs-12 ambientales-texto1 mobile no-pad">
            <p class="ambiental-grid-titulo1 fade-up">REFORESTACIÓN</p>
            <p class="academico-grid-texto1 fade-up">El Medio Ambiente es uno de los pilares principales de Iniciativa Xala, por lo mismo, en conjunto con la comunidad de José María Morelos, hicimos un evento de reforestación en el cual limpiamos y plantamos más de 70 árboles en uno de los andadores más importantes de la localidad.</p>
        </div>
    </div>

    <div class="row equal-height-cols row-proyectos-medio-ambiente no-pad2">
        <div class="col-md-6 ambientales-grid-img2 no-pad desk">
            <div class="contenedor-texto2-ambientales">
                <p class="academico-grid-titulo2 fade-up">LIMPIEZA DE LAGUNAS</p>
                <p class="academico-grid-texto2 fade-up">En conjunto con la cooperativa de pescadores y de la comunidad, se llevó a cabo la limpieza de la Laguna Chalacatepec, considerado como uno de los sitios Ramsar más importantes del estado de  Jalisco,  en donde, sumando esfuerzos se logró limpiar el lugar, recolectar la basura y separarla para darle el uso correcto a la misma.</p>
            </div>
        </div>
        <div class="col-md-6 academicos-grid-img1 no-pad">
            <div class="ambiental-grid1-img1"></div>
{{-- 
            <?=Slick::widget([
                'items' => [
                    '<div class="ambiental-grid1-img1"></div>',
                    '<div class="ambiental-grid1-img2"></div>',
                    '<div class="ambiental-grid1-img3"></div>',
                ],

                'clientOptions' => [
                    'autoplay' => true,
                    'dots'     => true,
                ],

            ]); ?>
             --}}
        </div>
        <div class="col-xs-12 ambientales-texto2 no-pad mobile">
            <p class="academico-grid-titulo2 fade-up">LIMPIEZA DE LAGUNAS</p>
            <p class="academico-grid-texto2 fade-up">En conjunto con la cooperativa de pescadores y de la comunidad, se llevó a cabo la limpieza de la Laguna Chalacatepec, considerado como uno de los sitios Ramsar más importantes del estado de  Jalisco,  en donde, sumando esfuerzos se logró limpiar el lugar, recolectar la basura y separarla para darle el uso correcto a la misma.</p>
        </div>
    </div>
</section>

    
@endsection