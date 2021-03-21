@extends('layouts.main')

@section('title', 'Nosotros')

@section('content')


<section class="section-nosotros-titulo">
    <div class="container container-nosotros-titulo">
        <div class="row">
            <div class="col-md-12">
                <p class="nosotros-titulo">NOSOTROS</p>
            </div>
        </div>
    </div>
</section>


<section class="section-mision">
    <div class="row row-mision no-pad">
        <div class="col-md-4 div-mision">
            <img src="{{asset('images/mision.png')}}" alt="" class="img-responsive img-vision">
            <p class="titulo-mision">MISIÓN</p>
            <p class="texto-mision">Adaptamos una filosofía de ser fundamentada en dos pilares principales: el cuidado y  mejoramiento del medio ambiente; y el bienestar social, educativo y económico de las comunidad de José María Morelos.</p>
        </div>
        <div class="col-md-4 div-vision">
            <img src="{{('images/vision.png')}}" alt="" class="img-responsive img-vision">
            <p class="titulo-vision">VISIÓN</p>
            <p class="texto-vision">Incorporar la misión de Iniciativa Xala en cada una de las acciones o proyectos que se lleven a cabo, respetando los valores y pilares fundamentales de la asociación.</p>
        </div>
        <div class="col-md-4 div-mision">
            <img src="{{asset('images/valores.png')}}" alt="" class="img-responsive img-valores">
            <p class="titulo-valores">VALORES</p>
            <p class="texto-valores">Compromiso, Generosidad, Transparencia, Sustentabilidad, Respeto al Medio Ambiente, Igualdad, Solidaridad y Transformación Social.</p>
        </div>
    </div>
</section>
<section class="section-iniciativa">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="titulo-iniciativa fade-up">INICIATIVA XALA</p>
                <p class="texto-iniciativa fade-up">Queremos crecer en armonía con el entorno. Devolver lo que la vida y el mundo nos da a través de acciones positivas que refuercen el tejido social y que promuevan el desarrollo y sustentabilidad de la zona y sus habitantes a través de actividades y programas encaminados al progreso;  sin perder de vista los valores familiares y por supuesto, nuestro preciado ecosistema. Todo esto solo se logra con tu ayuda e interacción con la comunidad y la naturaleza del maravilloso estado de Jalisco.</p>
            </div>
        </div>
    </div>
</section>
<section class="section-inversion">
    <div class="container">
        <div class="row wrap-images-xala desk">
            <img src="{{asset('images/X.png')}}" alt="" class="img-responsive vi-img fade-up">
            <img src="{{asset('images/A1.png')}}" alt="" class="img-responsive vi-img fade-down">
            <img src="{{asset('images/L.png')}}" alt="" class="img-responsive vi-img fade-up">
            <img src="{{asset('images/A2.png')}}" alt="" class="img-responsive vi-img fade-right">
        </div>
        <div class="row wrap-images-xala mobile">
            <img src="{{asset('images/X.png')}}" alt="" class="img-responsive vi-img fade-up">
            <img src="{{asset('images/A1.png')}}" alt="" class="img-responsive vi-img fade-down">
        </div>
        <div class="row wrap-images-xala mobile">
            <img src="{{asset('images/L.png')}}" alt="" class="img-responsive vi-img fade-up">
            <img src="{{asset('images/A2.png')}}" alt="" class="img-responsive vi-img fade-right">
        </div>
    </div>
</section>

@endsection