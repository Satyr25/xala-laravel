@extends('layouts.main')
@section('title', 'Contacto')

@section('content')
    
<section class="section-contacto-titulo">
    <div class="container container-contacto-titulo">
        <div class="row">
            <div class="col-xs-12">
                <p class="contacto-titulo">CONTACTO</p>
            </div>
        </div>
    </div>
</section>


<section class="section-contacto-form">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <p class="titulo-contacto-form">QUEREMOS SABER DE TI</p>
                <form action="{{route('contacto.sendEmail')}}" method="POST" id="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 row-input-contacto">
                            <span class="contacto-label-form">Nombre </span>
                            <div class="form-group field-contactform-name required">
                                <input type="text" id="contactform-name" class="form-control" name="name" aria-required="true" aria-invalid="true" value="{{old('name')}}">
                            </div>
                        </div>
                        @error('name')
                            <br>
                            <div class="help-block-error">{{$message}}</div> 
                            <br>  
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-12 row-input-contacto ">
                            <span class="contacto-label-form">Empresa </span>
                            <div class="form-group field-contactform-company required">
                                <input type="text" id="contactform-company" class="form-control" name="company" aria-invalid="false" value="{{old('company')}}">
                            </div>
                            <div class="help-block-error"></div>   
                        </div>
                        <div class="col-xs-12 row-input-contacto ">
                            <span class="contacto-label-form">Correo electrónico </span>
                            <div class="form-group field-contactform-email required">
                                <input type="text" id="contactform-email" class="form-control" name="email" aria-required="true" aria-invalid="true" value="{{old('email')}}">
                            </div>
                        </div>
                        @error('email')
                            <br>
                            <div class="help-block-error">{{$message}}</div> 
                            <br>  
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-12 row-input-contacto">
                            <span class="contacto-label-form">Número teléfonico </span>
                            <div class="form-group field-contactform-phone required">
                                <input type="text" id="contactform-phone" class="form-control" name="phone" aria-required="true" aria-invalid="true" value="{{old('phone')}}">
                            </div>
                            <div class="help-block-error"></div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 row-input-contacto">
                            <span class="contacto-label-form">Comentarios </span>
                            <div class="form-group field-contactform-comments required">
                                <input type="text" id="contactform-comments" class="form-control" name="comments" aria-required="true" aria-invalid="true" value="{{old('comments')}}">
                            </div>
                        </div>
                        @error('comments')
                            <br>
                            <div class="help-block-error">{{$message}}</div> 
                            <br>  
                        @enderror  
                    </div>
                    <div class="row">
                        <div class="col-xs-offset-4 col-md-offset-7 col-xs-4 fade-up">
                            <button type="submit" class="send-contact-button">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5 datos-contacto">
                <p class="subtitulo-datos">CORREO ELECTRÓNICO</p>
                <p class="texto-datos">info@iniciativaxala.org</p>
                <p class="subtitulo-datos">TELÉFONO</p>
                <p class="texto-datos">32 2209 0380</p>
                <p class="subtitulo-datos">DOMICILIO</p>
                <p class="texto-datos">Gregorio Lucas Reyes #41</p>
                <p class="texto-datos">Col. José María Morelos. Mpio. de Tomatlán Jalisco</p>
                <p class="texto-datos">C.P. 48495</p>
                <div class="wrap-social fade-right">
                    <a href="https://www.instagram.com/iniciativaxala/" target="_blank">
                        <img src="{{asset('images/logo/ig.png')}}" alt="" class="img-responsive contacto-img-social">
                    </a>
                    <a href="https://www.facebook.com/Iniciativa-Xala-102174904929111/" target="_blank">
                        <img src="{{asset('images/logo/fb.png')}}" alt="" class="img-responsive contacto-img-social">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="background-rectangle desk"></div>
</section>
<section class="section-map">
    <iframe src="https://www.google.com/maps?q=19.6754735, -105.1862719&z=17&output=embed" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>

@endsection