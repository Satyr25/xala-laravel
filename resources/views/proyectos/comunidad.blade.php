@extends('layouts.main')
@section('title', 'Comunidad')

@section('content')
    
<section class="section-academicos">
    <div class="container container-academicos">
        <div class="row row-titulo-academicos">
            <div class="col-xs-2 col-md-4">
                <a href="{{url('proyectos')}}">
                    <img src="{{asset('images/flecha_atras.png')}}" alt="" class="img-responsive flecha-atras">
                </a>
            </div>
            <div class="col-xs-8 col-md-4">
                <p class="titulo-academicos">COMUNIDAD</p>
            </div>
        </div>
    </div>
</section>


<section class="proyectos-grid">
    <div class="container no-pad2">
        <div class="row equal-height-cols row-proyectos-academicos no-pad">
            <div class="col-md-6 academicos-grid-img1 no-pad">
                <div class="academicos-grid1-img1"></div>
{{-- 
                <?= /*Slick::widget([
                    'items' => [
                    '<div class="academicos-grid1-img1"></div>',
                    '<div class="academicos-grid1-img2"></div>',
                    '<div class="academicos-grid1-img3"></div>',
                    ],

                    'clientOptions' => [
                        'autoplay' => true,
                        'dots'     => true,
                    ],

                ]); */ ?>
                 --}}
            </div>
            <div class="col-md-6 desk">
                <div class="contenedor-texto ">
                    <p class="proyecto-grid-titulo-rosa">DONACIÓN DE EQUIPO DEPORTIVO</p>
                    <p class="academico-grid-texto1">En Iniciativa Xala gestionamos la entrega de balones a la secundaria técnica #108 en la comunidad de José María Morelos, ya que no se contaba con el material suficiente para realizar y disfrutar de actividades deportivas.</p>
                </div>
            </div>
            <div class="col-xs-12 academicos-texto1 mobile">
                <p class="proyecto-grid-titulo-rosa fade-up">DONACIÓN DE EQUIPO DEPORTIVO</p>
                <p class="academico-grid-texto1 fade-up">En Iniciativa Xala gestionamos la entrega de balones a la secundaria técnica #108 en la comunidad de José María Morelos, ya que no se contaba con el material suficiente para realizar y disfrutar de actividades deportivas.</p>
            </div>
        </div>
    </div>
    
    <div class="row equal-height-cols row-proyectos-ambientales no-pad">
        <div class="col-md-6 academicos-grid-img2 no-pad desk">
            <div class="contenedor-texto2">
                <p class="academico-grid-titulo2 fade-up">FERIA DEL LIBRO</p>
                <p class="academico-grid-texto2 fade-up">Tuvimos la oportunidad de participar en un evento cultural en la escuela urbana #1057 comunidad de José María Morelos, el cual estuvo enfocado en fomentar el hábito de la lectura en niños y adultos de la comunidad.</p>
            </div>
        </div>
        <div class="col-md-6 academicos-grid-img1 no-pad">
            <div class="academicos-grid2-img1"></div>
{{-- 
            <?=/*Slick::widget([
                'items' => [
                '<div class="academicos-grid2-img1"></div>',
                '<div class="academicos-grid2-img2"></div>',
                '<div class="academicos-grid2-img3"></div>',
                ],

                'clientOptions' => [
                    'autoplay' => true,
                    'dots'     => true,
                ],

            ]); */?>
             --}}
        </div>
        <div class="col-xs-12 academicos-texto2 mobile">
            <p class="academico-grid-titulo2 fade-up">FERIA DEL LIBRO</p>
            <p class="academico-grid-texto2 fade-up">Tuvimos la oportunidad de participar en un evento cultural en la escuela urbana #1057 comunidad de José María Morelos, el cual estuvo enfocado en fomentar el hábito de la lectura en niños y adultos de la comunidad.</p>
        </div>
    </div>
</section>

    
@endsection