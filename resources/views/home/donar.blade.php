@extends('layouts.main')
@section('title', 'Donar')
    
@section('content')
    
<section class="donation">
    <div class="container">
        <div class="row">
            <div class="col-md-9 contenedor-izq">
                <div class="container-fluid">
                    <!-- bloque donacion paypal -->
                    <div class="paypal-donation">
                        <div class="div-titulo-monetaria">
                            <div class="row row-titulo-monetaria">
                                <div class="col-xs-10 title-wrapper">
                                    <p class="titulo-monetaria">Donación monetaria</p>
                                </div>
                                <div class="col-xs-2 no-pad">
                                    <button type="button" class="display-section-button" data-parent=".paypal-donation" data-display=".content" data-images-class=".paypal-display-icon">
                                        <img src="{{asset('images/pleca_abajo.png')}}" alt="" class="img-responsive paypal-display-icon">
                                        <img src="{{asset('images/pleca_arriba.png')}}" alt="" class="img-responsive paypal-display-icon hidden">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="content content-monetaria">
                            <div class="form-block">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="monetaria-texto">Selecciona una cantidad</p>
                                    </div>
                                </div>
                                <div class="row donation-type-selectors">
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <button type="button" class="type {{ old('amountType') == 'U' ? 'active' : '' }}" data-type-amount="U">
                                            Donación única
                                        </button>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <button type="button" class="type {{ old('amountType') == 'M' ? 'active' : '' }}" data-type-amount="M">
                                            Donación mensual
                                        </button>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <button type="button" class="type {{ old('amountType') == 'A' ? 'active' : '' }}" data-type-amount="A">
                                            Donación anual
                                        </button>
                                    </div>
                                </div>
                                @error('amountType')
                                    <div class="help-block-error">{{$message}}</div> 
                                    <br>
                                @enderror
                                <div class="row amount-selectors">
                                    <div class="U amount-buttons {{ old('amountType') ? (old('amountType') != 'U' ? 'hidden' : '') : '' }}">
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="100" class="amount {{ old('amount') == '100' ? 'active' : '' }}">
                                                $100 MXN
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="500" class="amount {{ old('amount') == '500' ? 'active' : '' }}">
                                                $500 MXN
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="1000" class="amount {{ old('amount') == '1000' ? 'active' : '' }}">
                                                $1000 MXN
                                            </button>
                                        </div>
                                    </div>
                                    <div class="A amount-buttons {{ old('amountType') ? (old('amountType') != 'A' ? 'hidden' : '') : 'hidden' }}">
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="1000" class="amount {{ old('amount') == '1000' ? 'active' : '' }}">
                                                $1000 MXN
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="5000" class="amount {{ old('amount') == '5000' ? 'active' : '' }}">
                                                $5000 MXN
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="10000" class="amount {{ old('amount') == '10000' ? 'active' : '' }}">
                                                $10000 MXN
                                            </button>
                                        </div>
                                    </div>
                                    <div class="M amount-buttons {{ old('amountType') ? (old('amountType') != 'M' ? 'hidden' : '') : 'hidden' }}">
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="20" class="amount {{ old('amount') == '20' ? 'active' : '' }}">
                                                $20 MXN
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="100" class="amount {{ old('amount') == '100' ? 'active' : '' }}">
                                                $100 MXN
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <button type="button" data-fixed-amount="1000" class="amount {{ old('amount') == '1000' ? 'active' : '' }}">
                                                $1000 MXN
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-6 div-otra-cantidad">
                                        <button type="button" class="amount" id="custom-button" data-parent=".form-block" data-display=".custom-amount">
                                            Otra cantidad
                                        </button>
                                    </div>
                                </div>
                                <div class="row custom-amount" style="display:none">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon"><p class="custom-amount-label">MXN $</p></div>
                                            <input type="text" class="form-control" id="custom-amount-input">
                                        </div>
                                    </div>
                                </div>
                                
                                @error('amount')
                                    <div class="help-block-error">{{$message}}</div> 
                                @enderror

                                <form action="{{route('donaciones.donacion')}}" method="POST" class="formulario-donacion">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="monetaria-texto">
                                                ¿Te gustaría donar a un proyecto en específico?
                                            </p>
                                            <div class="text-center">
                                                <div class="form-group field-donationform-project required">
                                                    <div>
                                                        <input type="hidden" name="project" value="{{old('project')}}">    
                                                        <div id="donationform-project" role="radiogroup" aria-required="true">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="project" value="E" {{old('project') == 'A' ? 'checked' : ''}}> Comunidad
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="project" value="A" {{old('project') == 'E' ? 'checked' : ''}}> Medio Ambiente
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="project" value="I" {{old('project') == 'I' ? 'checked' : ''}}> Indistinto
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                        @error('project')
                                                            <div class="help-block-error">{{$message}}</div> 
                                                        @enderror
                                                    </div>
                                                </div>      
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        
                                            <div class="form-group field-donationform-isinothername">
                                                <div class="checkbox">
                                                    <label for="donationform-isinothername">
                                                        <input type="hidden" name="isInOtherName" value="0">
                                                        <input type="checkbox" id="donationform-isinothername" name="isInOtherName" value="1" data-parent=".form-block" data-display=".dedication-block" {{old('isInOtherName')?'checked':''}}>
                                                        Dedicar <strong>en nombre o en memoria</strong> de alguien
                                                        <span class="checkmark2"></span>
                                                    </label>
                                                    <p class="help-block help-block-error"></p>
                                                </div>
                                            </div> 
                                        
                                        </div>
                                    </div>
                                    <div class="dedication-block" style="{{old('isInOtherName')=='1'?'display:block':'display:none'}}">
                                        <div class="row">
                                            <div class="col-md-12 wrap-dedicacion">
                                                <span>Tipo:</span>
                                                    <div class="form-group field-donationform-dedicationtype">
                                                        <div>
                                                            <input type="hidden" name="dedicationType" value="">
                                                            <div id="donationform-dedicationtype" role="radiogroup">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="dedicationType" value="H" {{old('dedicationType')=='H'?'checked':''}}> En honor de...
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="dedicationType" value="M" {{old('dedicationType')=='M'?'checked':''}}> En memoria de ...
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            @error('dedicationType')
                                                                <div class="help-block-error">{{$message}}</div> 
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="texto-decdicatoria" >Nombre a quien se dedica</p>
                                            </div>
                                            <div class="col-xs-6 col-md-4 col-input izq">
                                                <input type="text" name="dedicationFirstName" class="form-control" placeholder="Nombre" value="{{old('dedicationFirstName')}}">
                                                @error('dedicationFirstName')
                                                    <div class="help-block-error">{{$message}}</div> 
                                                @enderror
                                            </div>
                                            <div class="col-xs-6 col-md-4 col-input der">
                                                <input type="text" name="dedicationLastName" class="form-control"  placeholder="Apellido" value="{{old('dedicationLastName')}}">
                                                @error('dedicationLastName')
                                                    <div class="help-block-error">{{$message}}</div> 
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row row-gris-dedicacion">
                                            <div class="col-md-4">
                                                <p class="texto-decdicatoria" >Email del destinatario</p>
                                            </div>
                                            <div class="col-md-8 col-input">
                                                <input type="text" name="receiverEmail" class="form-control" placeholder="Email"  value="{{old('receiverEmail')}}">
                                                @error('receiverEmail')
                                                    <div class="help-block-error">{{$message}}</div> 
                                                @enderror
                                                <p class="bloque-ayuda">Opcionalmente envié un correo electrónico de notificación</p>
                                            </div>
                                        </div>
                                        <div class="row row-gris-dedicacion">
                                            <div class="col-md-4">
                                                <p class="texto-decdicatoria" >Nombre del destinatario</p>
                                            </div>
                                            <div class="col-xs-6 col-md-4 col-input izq">
                                                <input type="text" name="receiverFirstName" class="form-control" placeholder="Nombre"  value="{{old('receiverFirstName')}}">
                                                @error('receiverFirstName')
                                                    <div class="help-block-error">{{$message}}</div> 
                                                @enderror
                                            </div>
                                            <div class="col-xs-6 col-md-4 col-input der">
                                                <input type="text" name="receiverLastName" class="form-control" placeholder="Apellido" value="{{old('receiverLastName')}}">
                                                @error('receiverLastName')
                                                    <div class="help-block-error">{{$message}}</div> 
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="subtitulo-monetaria">Información Personal</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="texto-decdicatoria">Nombre*</p>
                                        </div>
                                        <div class="col-xs-6 col-md-4 no-margin-bottom col-input izq">
                                            <input type="text" name="firstName" class="form-control" placeholder="Nombre" value="{{old('firstName')}}">
                                            @error('firstName')
                                                <div class="help-block-error">{{$message}}</div> 
                                            @enderror
                                        </div>
                                        <div class="col-xs-6 col-md-4 no-margin-bottom col-input der">
                                            <input type="text" name="lastName" class="form-control" placeholder="Apellido" value="{{old('lastName')}}">
                                            @error('lastName')
                                                <div class="help-block-error">{{$message}}</div> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-8 no-margin-top col-input">
                                        
                                            <div class="form-group field-donationform-isanonymous">
                                                <div class="checkbox">
                                                    <label for="donationform-isanonymous">
                                                        <input type="hidden" name="isAnonymous" value="0">
                                                        <input type="checkbox" id="donationform-isanonymous" name="isAnonymous" value="1" {{old('isAnonymous')=='1'?'checked':''}}>
                                                        Donar de forma anónima
                                                        <span class="checkmark3"></span>
                                                    </label>
                                                    @error('isAnonymous')
                                                        <div class="help-block-error">{{$message}}</div> 
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="texto-decdicatoria">Email*</p>
                                        </div>
                                        <div class="col-md-8 no-margin-bottom col-input">
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                            <p class="bloque-ayuda">Tu recibo será enviado a este correo</p>
                                            @error('email')
                                                <div class="help-block-error">{{$message}}</div> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-8 no-margin-top col-input">
                                        
                                            <div class="form-group field-donationform-canbecontacted">
                                                <div class="checkbox">
                                                    <label for="donationform-canbecontacted">
                                                        <input type="hidden" name="canBeContacted" value="0">
                                                        <input type="checkbox" id="donationform-canbecontacted" name="canBeContacted" value="1" {{old('canBeContacted')=='1'?'checked':''}}>
                                                        Pueden contactarme en el futuro
                                                        <span class="checkmark3"></span>
                                                    </label>
                                                    @error('canBeContacted')
                                                        <div class="help-block-error">{{$message}}</div> 
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="texto-decdicatoria">Teléfono</p>
                                        </div>
                                        <div class="col-md-8 col-input">
                                            <input type="text" name="phone" class="form-control" placeholder="Telefóno" value="{{old('phone')}}">
                                            @error('phone')
                                                <div class="help-block-error">{{$message}}</div> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="texto-decdicatoria">Género</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4 col-input">
                                                    <select name="gender" class="form-control">
                                                        <option value="" >Elegir</option>
                                                        <option value="M" {{old('gender') == 'M' ? 'selected' : ''}}>Masculino</option>
                                                        <option value="F" {{old('gender') == 'F' ? 'selected' : ''}}>Femenino</option>
                                                        <option value="N" {{old('gender') == 'N' ? 'selected' : ''}}>No especificado</option>
                                                    </select>
                                                </div>
                                                @error('gender')
                                                    <div class="help-block-error">{{$message}}</div> 
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="texto-decdicatoria">Fecha de Nacimiento</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-xs-4 col-input izq">
                                                    <select name="birthday_day" class="form-control">
                                                        <option value="">Día</option>
                                                        @foreach ($days as $day)
                                                            <option value="{{$day}}" {{old('birthday_day') == $day ? 'selected' : ''}}>{{$day}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xs-4 col-input mid">
                                                    <select name="birthday_month" class="form-control">
                                                        <option value="">Mes</option>
                                                        @foreach ($months as $k => $month)   
                                                        <option value="{{$k}}"  {{old('birthday_month') == $k ? 'selected' : ''}}>{{$month}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xs-4 col-input der">
                                                    <select name="birthday_year" class="form-control">
                                                        <option value="" >Año</option>
                                                        @foreach ($years as $year)
                                                        <option value="{{$year}}" {{old('birthday_year') == $year ? 'selected' : ''}}>{{$year}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        @error('birthday_day')
                                            <div class="help-block-error">{{$message}}</div> 
                                        @enderror
                                        @error('birthday_month')
                                            <div class="help-block-error">{{$message}}</div> 
                                        @enderror
                                        @error('birthday_year')
                                            <div class="help-block-error">{{$message}}</div> 
                                        @enderror
                                    </div>
                                    <div class="row terms">
                                        <div class="col-md-12 text-center">
                                            <p class="texto-condiciones">Al dar click aceptas los Términos y condiciones y Políticas de Privacidad</p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="amount" id="donationform-amount" class="form-control" value="{{old('amount')}}">
                                    <input type="hidden" name="amountType" id="donationform-amounttype" class="form-control"  value="{{old('amountType')}}">
                                    <div class="row submit-donation">
                                        <div class="col-md-12 text-center">
                                            <div class="inner hidden-sm hidden-md hidden-lg">
                                                <button type="submit" class="submit-button">¡Dona ahora!</button>
                                                <div class="same-row-logo">
                                                    <div class="cantidad-wrapper">
                                                        <p class="text">Cantidad</p>
                                                        <p class="money">$<span class="number">0.00</span> USD</p>
                                                    </div>
                                                    <img src="{{asset('images/payment/paypal.png')}}" alt="" class="paypal-logo">
                                                </div>
                                            </div>
                                            <div class="inner hidden-xs">
                                                <button type="submit" class="submit-button">¡Dona ahora!</button>
                                                <div class="cantidad-wrapper">
                                                    <p class="text">Cantidad</p>
                                                    <p class="money">$<span class="number">0.00</span> MXN</p>
                                                </div>
                                                <img src="{{asset('images/payment/paypal.png')}}" alt="" class="paypal-logo">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    
                    <!-- bloque donacion Transferencia -->
                    <div class="cash-donation">
                        <div class="title div-titulo-monetaria">
                            <div class="row row-titulo-monetaria">
                                <div class="col-xs-10 col-sm-10 title-wrapper">
                                    <p class="titulo-monetaria">Transferencia o ventanilla</p>
                                </div>
                                <div class="col-xs-2 no-pad">
                                    <button type="button" class="display-section-button" data-parent=".cash-donation" data-display=".content" data-images-class=".money-display-icon">
                                        <img src="{{asset('images/pleca_arriba.png')}}" alt="" class="img-responsive money-display-icon">
                                        <img src="{{asset('images/pleca_abajo.png')}}" alt="" class="img-responsive money-display-icon hidden">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="content content-monetaria" style="display:none">
                            <p>También puedes realizar una transferencia electrónica desde tu banca en línea o bien, directo en ventanilla con la siguiente información:</p>
                            <p class="bank">Banco BBVA Bancomer</p>
                            <p class="info"><strong>Fundación BK Partners A.C.</strong></p>
                            <p class="info">Cuenta 0113156990</p>
                            <p class="info">CLABE Interbancaria 012180001131569903</p>
                            <p class="info">Divisa MXN Pesos Mexicanos</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 faq-block">
                <div class="container-fluid">
                    <div class="row row-faqs">
                        <div class="col-md-12">
                            <p class="subtitulo-faqs">Solicita tu donativo libre de impuestos</p>
                            <p><span class="lista-faqs">1</span>Realiza tu donativo</p>
                            <p><span class="lista-faqs">2</span>Envía tu comprobante de pago y Cédula de Información Fiscal a <a href="mailto:info@iniciativaxala.org"><u>info@iniciativaxala.org</u></a></p>
                            <p><span class="lista-faqs">3</span>En máximo 5 días hábiles recibirás tu factura deducible de impuestos</p>
                            <p class="nota">
                                *Para recibir información sobre el proceso de donativos extranjeros, favor de contactarnos <a href="mailto:info@iniciativaxala.org"><u>info@iniciativaxala.org</u></a>
                            </p>
                        </div>
                    </div>
                    <div class="row row-faqs">
                        <div class="col-md-12">
                            <p class="subtitulo-faqs">FAQ'S</p>
                        </div>
                    </div>
                    <div class="row question row-faqs">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <p>
                                <strong>¿Cómo funciona una deducción de impuestos?</strong>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <button type="button" class="faq-display-button" data-parent=".question" data-display=".content"><strong>+</strong></button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 content" style="display:none">
                            <p>
                                Cualquier donativo a donataria autorizada puede ser acumulado a las deducciones personales del ejercicio fiscal.
                            </p>
                        </div>
                    </div>
                    <div class="row question row-faqs">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <p>
                                <strong>¿Hay un límite en la cantidad de impuestos que puedo deducir?</strong>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <button type="button" class="faq-display-button" data-parent=".question" data-display=".content"><strong>+</strong></button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 content" style="display:none">
                            <p>
                                No puede exceder el 7% de los ingresos acumulables del ejercicio fiscal anterior. Si llegara a exceder este limite, el monto no se deduce de los impuestos a pagar en ese año.
                            </p>
                            <p>
                                Morales beneficios – pueden deducir hasta 7% de utilidad fiscal obtenida.
                            </p>
                        </div>
                    </div>
                    <div class="row question row-faqs">
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <p>
                                <strong>¿Qué debo de hacer al recibir mi factura?</strong>
                            </p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <button type="button" class="faq-display-button" data-parent=".question" data-display=".content"><strong>+</strong></button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 content" style="display:none">
                            <p>
                                Presenta el CFDI a tu contador o verifica en tu declaración de impuestos anual que el donativo se vea reflejado.
                            </p>
                        </div>
                    </div>
                    <div class="row row-faqs">
                        <div class="col-md-12">
                            <p>Si tienes una pregunta diferente, <a href="{{route('home.contacto')}}"><strong>contáctanos</strong></a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection