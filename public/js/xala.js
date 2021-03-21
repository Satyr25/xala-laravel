$(document).ready(function () {
  // Maneja click del boton de menu
  $('#hamburger, .toggle-menu-button').on('click', function () {
    $('.overlay, #hamburger, .toggle-menu-button').toggleClass('active');
    $('.navbar').toggleClass('menu-displayed');
    $('.logo-img').toggleClass('hidden');
    $('.close').trigger('click');
  });

  // maneja click en tipo de donacion
  $('.type').on('click', function () {
    changeActiveClassFromButtons(this);
    var typeAmount = $(this).data('type-amount');
    $('#donationform-amounttype').val(typeAmount);
    $('.amount-buttons').addClass('hidden');
    $('.amount-buttons.' + typeAmount).removeClass('hidden');
  })

  // maneja click en montos
  $('.amount').on('click', function () {
    changeActiveClassFromButtons(this);
    if ($(this).attr('id') == 'custom-button') {
      toggleVisibilityContentFromSibling(this);
      var tmpAmount = parseInt($('#custom-amount-input').val());
      var amount = tmpAmount > 0 ? tmpAmount : 0;
    } else {
      $('.custom-amount').slideUp();
      var amount = $(this).data('fixed-amount');
    }
    $('#donationform-amount').val(amount);
    $('.cantidad-wrapper .number').text(amount.toFixed(2));
  })

  // maneja entrada en el campo de cantidad
  $('#custom-amount-input').on('input', function () {
    if ($('#custom-button').hasClass('active')) {
      var tmpAmount = parseInt($('#custom-amount-input').val());
      var amount = tmpAmount > 0 ? tmpAmount : 0;
      $('#donationform-amount').val(amount);
      $('.cantidad-wrapper .number').text(amount.toFixed(2));
    }
  })

  // maneja click en los botones de las preguntas del faq
  $('.faq-display-button').on('click', function () {
    toggleVisibilityContentFromSibling(this);
    $(this).text() == '+' ? $(this).text('-') : $(this).text('+');
  })

  // maneja click en los botones de los diferentes tipos de donacion
  $('.display-section-button').on('click', function () {
    toggleVisibilityContentFromSibling(this);
    $($(this).data('images-class')).toggleClass('hidden');
  })

  $('.paypal-donation .title-wrapper, .cash-donation .title-wrapper').on('click', function() {
    var button = $(this).parents('.title').find('.display-section-button');
    button[0].click();
  })

  // maneja entrada en el checkbox de la donacion en nombre de alguien mas
  $('#donationform-isinothername').on('input', function() {
    toggleVisibilityContentFromSibling(this)
  })

  // Funciones a llamar cuando existe el carrusel del index
  if ($('.index-carousel').length > 0) {
    setupIndexCarousel();
  }

  // Funciones a llamar cuando existe el carrusel de proyectos
  if ($('.project-carousel').length > 0) {
    setupProjectCarousel();
  }

  // Funciones a llamar para inicializar aos en las paginas especificadass
  if ($('.site-index').length > 0) {
    initializaAOS();
  }
    
    $(window).scroll(function(){
        
        var options = {
//            root: '', //por defecto es el tamaño de pantalla
            rootMargin: '0px',
            threshold: 0.8
        }
        var observerUp = new IntersectionObserver(observerRespUp, options);
        const targetUp = document.querySelectorAll('.fade-up');
        targetUp.forEach(targetUp => {
            observerUp.observe(targetUp);
        });
        
        var observerLeft = new IntersectionObserver(observerRespLeft, options);
        const targetLeft = document.querySelectorAll('.fade-left');
        targetLeft.forEach(targetLeft => {
            observerLeft.observe(targetLeft);
        });
        
        var observerRight = new IntersectionObserver(observerRespRight, options);
        const targetRight = document.querySelectorAll('.fade-right');
        targetRight.forEach(targetRight => {
            observerRight.observe(targetRight);
        });
        
        var observerDown = new IntersectionObserver(observerRespDown, options);
        const targetDown = document.querySelectorAll('.fade-down');
        targetDown.forEach(targetDown => {
            observerDown.observe(targetDown);
        });
        var observerXala = new IntersectionObserver(observerRespXala, options);
        const targetXala = document.querySelectorAll('.section-iniciativa');
        targetXala.forEach(targetXala => {
            observerXala.observe(targetXala);
        });
    });
    
});

var observerRespXala = function(entries, observer) { 
    entries.forEach(entry => {
        if (entry.intersectionRatio == 1) {
//            entry.target.classList.add('up');
            $('.vi-img.fade-up').addClass('up');
            $('.vi-img.fade-right').addClass('right');
            $('.vi-img.fade-down').addClass('down');
            $('.vi-img.fade-left').addClass('left');
        }
    });
};
var observerRespUp = function(entries, observer) { 
    entries.forEach(entry => {
        if (entry.intersectionRatio == 1) {
            entry.target.classList.add('up');
        }
    });
};
var observerRespLeft = function(entries, observer) { 
    entries.forEach(entry => {
        if (entry.intersectionRatio == 1) {
            entry.target.classList.add('left');
        }
    });
};
var observerRespRight = function(entries, observer) { 
    entries.forEach(entry => {
        if (entry.intersectionRatio == 1) {
            entry.target.classList.add('right');
        }
    });
};
var observerRespDown = function(entries, observer) { 
    entries.forEach(entry => {
        if (entry.intersectionRatio == 1) {
            entry.target.classList.add('down');
        }
    });
};

// // inicializa el carrusel del index
// function setupIndexCarousel() {
//   $('.index-carousel').slick({
//     arrows: false,
//     dots: true
//   });
// }

// // inicializa el carrusel del proyecto
// function setupProjectCarousel() {
//   $('.project-carousel').slick({
//     arrows: false,
//     dots: true,
//     adaptiveHeight: true
//   });
// }

$('.slick').slick({
  slidesToShow: 1,
});

// inicializa AOS
function initializaAOS() {
  AOS.init();
}

// cambia la clase activo al elemnto que tuvo un evento click
function changeActiveClassFromButtons(element) {
  var className = $(element).attr('class');
  $('.' + className).removeClass('active');
  $(element).addClass('active');
}

// alterna entre visible e invisible el contenido hermano del elemento sleeccionado
function toggleVisibilityContentFromSibling(element) {
  var parent = $(element).data('parent');
  var content = $(element).data('display');
  var contentElement = $(element).parents(parent).find(content);
  $(contentElement).slideToggle();
}


//$('.video-index').click(function(){
//            alert('clikc')
//        })