@extends('layouts.main')

@section('title', 'Proyectos')
    
@section('content')
    
<section class="proyectos-index">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="proyecto-index-titulo">
                    Proyectos
                </p>
            </div>
            <div class="col-md-12">
                <p class="proyecto-index-texto">
                    Siguiendo nuestra visión de fomentar el desarrollo social y sustentable de la zona, hemos realizado proyectos con la comunidad jalisciense de José María Morelos que contemplan distintas áreas enfocadas al crecimiento integral y equitativo de la población.
                </p>
                <p class="proyecto-index-texto">
                    Los siguientes son algunos de los proyectos realizados divididos en nuestros dos pilares principales: comunidad y medio ambiente.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="proyectos-grid">
    <div class="row equal-height-cols row-proyectos-comunidad no-pad">
        <div class="col-md-6 academicos-grid-img1 no-pad">
            <div class="proyectos-grid1-img1"></div>
        </div>
        <div class="col-md-6 proyectos-grid-img1 no-pad desk">
            <div class="contenedor-texto">
                <p class="proyecto-grid-titulo">COMUNIDAD</p>
                <p class="proyecto-grid-texto">Éstos proyectos son nuestros favoritos, pues no solo vemos los resultados día con día, sino que sabemos que entre todos, colaboramos con la construcción de un México mejor. </p>
                <a href="{{url('/proyectos/comunidad')}}" class="btn-ver-mas">VER MÁS</a>
            </div>
        </div>
        <div class="col-xs-12 proyectos-texto1 mobile">
            <p class="proyecto-grid-titulo fade-up">COMUNIDAD</p>
            <p class="proyecto-grid-texto fade-up">Éstos proyectos son nuestros favoritos, pues no solo vemos los resultados día con día, sino que sabemos que entre todos, colaboramos con la construcción de un México mejor. </p>
            <a href="{{url('/proyectos/comunidad')}}" class="btn-ver-mas">VER MÁS</a>
        </div>
    </div>
    
    <div class="row equal-height-cols row-proyectos-ambientales-index no-pad">
        <div class="col-md-6 proyectos-grid-img2 no-pad desk">
            <div class="contenedor-texto2">
                <p class="proyecto-grid-titulo2 fade-up">MEDIO AMBIENTE</p>
                <p class="proyecto-grid-texto2 fade-up">Preservar lo que la madre tierra nos ha dado, es parte de nuestra visión. Trabajamos en generar proyectos que ayuden a construir nuevos modelos 100% sustentables y amigables con la naturaleza para mantener la armonía en el hábitat sin perder de vista el progreso de la sociedad.</p>
                <a href="{{url('/proyectos/medio-ambiente')}}" class="btn-ver-mas">VER MÁS</a>
            </div>
        </div>
        <div class="col-md-6 academicos-grid-img1 no-pad">
            <div class="proyectos-grid2-img1"></div>
        </div>
        <div class="col-xs-12 proyectos-texto2 mobile">
            <p class="proyecto-grid-titulo2 fade-up">MEDIO AMBIENTE</p>
            <p class="proyecto-grid-texto2 fade-up">Preservar lo que la madre tierra nos ha dado, es parte de nuestra visión. Trabajamos en generar proyectos que ayuden a construir nuevos modelos 100% sustentables y amigables con la naturaleza para mantener la armonía en el hábitat sin perder de vista el progreso de la sociedad.</p>
            <a href="{{url('/proyectos/comunidad')}}" class="btn-ver-mas">VER MÁS</a>
        </div>
    </div>
</section>



@endsection