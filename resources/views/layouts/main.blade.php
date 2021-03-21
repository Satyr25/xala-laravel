<?php 

if(Request::is('nosotros')){
    $nav_color = 'nav-color-us';
} else if (Request::is('/')){
    $nav_color = 'nav-color-home';
} else if (Request::is('home/contacto')){
    $nav_color = 'nav-color-contact';
} else if (Request::is('proyectos')){
    $nav_color = 'nav-color-proyects';
} else if (Request::is('donaciones')){
    $nav_color = 'nav-color-donaciones';
} else {
    $nav_color = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, height=device-height">
    <title>Iniciativa Xala - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/site.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/xala.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/min-350.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/min-768.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/min-992.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/min-1200.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/min-1700.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/max-1700.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/max-1440.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/max-1200.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/max-992.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/max-768.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/max-350.css')}}"> 
    <link rel="stylesheet" href="https://use.typekit.net/nvl5jcq.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script> 
    <script src="{{asset('js/slick.js')}}" type="text/javascript"></script> 
    <script src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script> 
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script> 
    <script src="{{asset('js/xala.js')}}" type="text/javascript"></script> 
    <script src="https://www.paypal.com/sdk/js?client-id={{}}"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top <?= $nav_color?>">
            <div class="container">
                <div class="row equal-height-cols">
                    <div class="col-md-4 col-sm-4 col-xs-4 flex-justify-left">
                        <div id="hamburger">
                          <span class="line"></span>
                          <span class="line"></span>
                        </div>
                        <button class="toggle-menu-button">
                            Menú
                        </button>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 flex-justify-center">
                        <a href=" {{url('/')}} " class="link-logo">
                            <img src=" {{asset('images/logo/logoColor.png')}} " alt="" class='logo-img'>
                            <img src=" {{asset('images/logo/logoGray.png')}} " alt="" class="logo-img hidden">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 flex-justify-right">
                        <div class="language-buttons hidden-xs">
                        </div>
                        <a href="{{route('home.donativos')}}" class="circle-golden-button <?=$nav_color?>">Donar</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="overlay <?= $nav_color ?>">
            <div class="navigation-links">
                <a href=" {{route('home')}} ">Inicio</a>
                <br>
                <a href="{{route('home.nosotros')}}">Nosotros</a>
                <br>
                <a href="{{route('proyectos.index')}}">Proyectos</a>
                <br>
                <a href="{{route('home.donativos')}}">Donativos</a>
                <br>
                <a href="{{route('home.contacto')}}">Contacto</a>
                <br>
                <div class="nav-social-wrap">
                    <a href="https://www.instagram.com/iniciativaxala/" target="blank" class="nav-img-socials">
                        <img src="{{asset('images/logo/ig.png')}}" alt="" class="img-responsive">
                    </a>
                    <a href="https://www.facebook.com/Iniciativa-Xala-102174904929111/" target="blank" class="nav-img-social">
                        <img src="{{asset('images/logo/fb.png')}}" alt="" class="img-responsive">
                    </a>
                </div>
                <div class="language-buttons-mobile mobile">
                </div>
            </div>
        </div>
    </header>
    <main class="main-wrap">
        @include('flash')
        @yield('content')
    </main>

    <?php if(!Request::is('donaciones')){ ?>
        <section class="seccion-index-donar hidden">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="titulo-index-donar">TUS DONACIONES HACEN LA DIFERENCIA</p>
                    </div>
                    <div class="col-xs-12 wrap-centrar">
                        <a href=" {{url('donaciones')}} " class="button-donar">¡DONAR AHORA!</a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    
<footer class="footer">
    <div class="container">
        <?php if(Request::is('site/index')){ ?>
            <div class="row">
                <div class="col-xs-12 wrap-centrar">
                    <img src="{{asset('images/logo/logoColor.png')}}" alt="" class="logo-img">
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12 wrap-footer-links">
                <a href="{{url('politicas-de-privacidad')}}" class="footer-link">AVISO DE PRIVACIDAD</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 footer-social-wrap">
                <a href="https://www.instagram.com/iniciativaxala/" target="blank" class="nav-img-socials">
                    <img src="{{asset('images/logo/ig.png')}}" alt="" class="img-responsive">
                </a>
                <a href="https://www.facebook.com/Iniciativa-Xala-102174904929111/" target="blank" class="nav-img-social">
                    <img src="{{asset('images/logo/fb.png')}}" alt="" class="img-responsive">
                </a>
            </div>
        </div>
    </div>
    
    <?php if (Request::is('/')){ ?>
    {{-- <div class="container">
        <div class="row">
            <div class="col-xs-12 wrap-ig">
                <p class="instagram-titulo">
                    INSTAGRAM 
                    <a href="https://www.instagram.com/INICIATIVAXALA/">@INICIATIVAXALA</a>
                </p>
                
                <div id="curator-feed-default-feed-layout"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
                <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
                <script type="text/javascript">
                /* curator-feed-default-feed-layout */
                (function(){
                    var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
                    i.src = "https://cdn.curator.io/published/709f9339-2d3f-4f5f-ba35-466572290dcc.js";
                    e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
                    })();
                </script>
<!--            <div class="ig-black"></div>-->
            </div>
        </div>
    </div> --}}
    <?php } ?>
    
</footer>

</body>
</html>