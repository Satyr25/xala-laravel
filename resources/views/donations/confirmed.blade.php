@extends('layouts.main')
@section('title', 'Donación confirmada')
    
@section('content')
    
<div class="container">
    <br>
    <div class="row row-confimed">
        <div class="col-md-2 wrap-centrar desk">
            <img src="{{asset('images/triangulo.png')}}" alt="" class="img-responsive fade-left">
        </div>
        <div class="col-md-8 paypal-donation">
            <div class="div-titulo-monetaria">
                <div class="row row-titulo-monetaria">
                    <div class="col-xs-12 title-wrapper">
                        <p class="titulo-monetaria">
                            Gracias por tu donativo.
                        </p>
                    </div>
                </div>
            </div>
            <div class="content content-monetaria">
                <div class="row ">
                    <div class="col-xs-12">
                        <p class="subtitulo-monetaria2">Datos de su donación</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="texto-dedicatoria2">Tipo de donación:</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="monetaria-texto">
                            <?php if($donation->donationType == 'U'){ ?> 
                                Donativo Único.    
                            <?php } else if ($donation->donationType == 'M'){ ?> 
                                Donativo Mensual.    
                            <?php } else if ($donation->donationType == 'A'){ ?> 
                                Donativo Anual.    
                            <?php } ?>    
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="texto-dedicatoria2">Cantidad donada:</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="monetaria-texto">{{'$'.number_format($donation->donationAmount, 2).' '.$donation->donationCurrency}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="texto-dedicatoria2">Donativo para un proyecto de:</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="monetaria-texto">
                            <?php if($donation->donationProject == 'E'){ ?> 
                                Apoyo al medio ambiente.    
                            <?php } else if ($donation->donationProject == 'A'){ ?> 
                                Apoyo a la comunidad    
                            <?php } else if ($donation->donationProject == 'I'){ ?> 
                                Indistinto
                            <?php } ?>    
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="texto-dedicatoria2">ID:</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="monetaria-texto">  
                            {{$donation->donationId}}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <?php if($donation->firstName){ ?> 
                            <p class="subtitulo-monetaria2">Datos del donante</p>
                        <?php } else { ?> 
                            <p class="subtitulo-monetaria2">Donativo realizado de forma Anónima</p>    
                        <?php } ?>
                    </div>
                </div>
                
                <?php if($donation->firstName){ ?> 
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Nombre:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto">  
                                {{$donation->firstName.' '.$donation->lastName}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Correo:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto">  
                                <?php if($donation->firstName){ ?> 
                                    {{$donation->email}}
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Telefóno:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto">  
                                {{$donation->phone}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Género:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto"> 
                                <?php if($donation->gender == 'M'){ ?> 
                                    Masculino.
                                <?php } else if ($donation->gender == 'F') { ?> 
                                    Femenino.    
                                <?php } else if ($donation->gender == 'N') { ?> 
                                    No especificado.    
                                <?php } ?> 
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Fecha de nacimineto:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto">  
                                {{$donation->birthday}}
                            </p>
                        </div>
                    </div>
                <?php } ?>
                <hr>
                <?php if($donation->isDedication){ ?> 
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="subtitulo-monetaria2">Datos de la dedicatoria.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Dedicatoria:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto">  
                                <?php if($donation->dedicationType == 'M'){ ?> 
                                    En Memoria de 
                                <?php } else if ($donation->dedicationType == 'H') { ?> 
                                    En Honor de   
                                <?php } ?>
                                {{$donation->dedicationFirstName.' '.$donation->dedicationLastName}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Correo para recibir dedicatoria:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto">  
                                {{$donation->receiverEmail}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="texto-dedicatoria2">Destinatario de la dedicatoria:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="monetaria-texto">  
                                {{$donation->receiverFirstName.' '.$donation->receiverLastName}}
                            </p>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-2 wrap-centrar desk">
            <img src="{{asset('images/ele.png')}}" alt="" class="img-responsive fade-right">
        </div>
    </div>
</div>

@endsection