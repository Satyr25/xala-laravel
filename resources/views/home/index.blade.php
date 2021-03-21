@extends('layouts.main')

@section('title', 'Home')

@section('content')

<section class="section-carrusel">
    <p class="texto-carrusel">LA GENEROSIDAD SE COMPARTE</p>

     <div class="slick">
        <div class="carrusel1"></div>
        {{-- <div class="carrusel2">zxczxc</div>
        <div class="carrusel3">vbnvbn</div> --}}
      </div>

</section>
<section class="seccion-iniciativa-xala">
    <div class="container">
        <div class="row equal-height-cols">
            <div class="col-md-2 wrap-centrar desk">
                <img src="{{asset('images/triangulo.png')}}" alt="" class="img-responsive fade-left">
            </div>
            <div class="col-md-8 div-iniciativa-xala">
                <p class="titulo-iniciativa-xala fade-up" >ACERCA DE INICIATIVA XALA</p>
                <p class="texto-iniciativa-xala fade-up">Somos una organización sin fines de lucro creada para participar dentro de la sociedad jalisciense con el único propósito de favorecer, crecer y enaltecer los valores sociales y culturales que predominan en la zona.</p>
                <p class="texto-iniciativa-xala fade-up">En conjunto con los habitantes de la comunidad de José María Morelos, nos encontramos desarrollando programas enfocados al mejoramiento y bienestar de sus familias y del medio ambiente.</p>
                <p class="texto-iniciativa-xala fade-up">A lo largo de estos años, hemos conformado una comunidad que busca el desarrollo de empleos y autoempleos a través de programas especializados en actividades (endémicas) propias de la zona.
                </p>
                <p class="texto-iniciativa-xala fade-up">Y sobre todo la creación de programas enfocados al desarrollo de los valores familiares y de comunidad.</p>
            </div>
            <div class="col-md-2 wrap-centrar desk">
                <img src="{{asset('images/ele.png')}}" alt="" class="img-responsive fade-right">
            </div>
        </div>
    </div>
</section>

<script src="https://www.youtube.com/iframe_api"></script>
<section class="index-video">
    <p class="texto-video fade-up">CONOCE MÁS SOBRE INICIATIVA XALA</p>
    
<!--    <iframe src="https://www.youtube.com/embed/UDk9kf2OE_4?enablejsapi=1&version=3&playerapiid=ytplayer&rel=0" id="video-index" class="video-index" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--   <iframe src="https://www.youtube.com/embed/UDk9kf2OE_4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
    
    <div id="video-index"></div>


    <script>
        
        
        var player, playing = false;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('video-index', {
                videoId: 'UDk9kf2OE_4',
                playerVars: {
//                    'controls': 0,
                    'rel': 0,
                },
                frameborder: 0,
                height: '100%',
                width: '100%',
                embed: true,
//                playerapiid: 'ytplayer',
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerStateChange(event) {

            if (event.data == YT.PlayerState.PLAYING) {
                $('.texto-video').hide();
                playing = true;
            } else if(event.data == YT.PlayerState.PAUSED){
                $('.texto-video').show();
                playing = false;
           }
        }
    </script>
</section>


@endsection