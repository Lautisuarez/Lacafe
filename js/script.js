(function() {
    "use strict";

    document.addEventListener('DOMContentLoaded', function() {
        function getMobileOperatingSystem() {
            var userAgent = navigator.userAgent || navigator.vendor || window.opera;

            // Windows Phone debe ir primero porque su UA tambien contiene "Android"
        if (/windows phone/i.test(userAgent)) {
            return "Windows Phone";
        }

        if (/android/i.test(userAgent)) {
            return "Android";
        }

            if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }

        return "desconocido";
        }

        if(document.querySelector('#promos')){
            let so = getMobileOperatingSystem();
            let claseCarta = document.getElementsByClassName('contenido-carta');
            let clasePromo = document.getElementById('promos');
            let claseBebida = document.getElementById('bebidas');
            let claseIndex = document.getElementsByClassName('parallax');
            let path = location.href;
            if(so === "iOS"){
                if(path == "http://127.0.0.1:5500/index.html"){
                    claseIndex[0].className += " isIOS";
                } else {
                    claseBebida.className += " isIOS";
                    clasePromo.className += " isIOS";
                    claseCarta[0].className += " isIOS";
                }
            }
        }
    });
}());

// DOCUMENT READY
$(function(){
    if(document.querySelector('#panificacion')){
        // Menú fijo
        var barraAltura = $('.site-header').innerHeight();
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if(scroll){
                $('.site-header').addClass('fixed');
                $('body').css({'margin-top': barraAltura+'px'});
            } else {
                $('.site-header').removeClass('fixed');
                $('body').css({'margin-top': '0px'});
            }
        });
        
        // NAVEGACION
        $('.nav-carta div:first').css({'display':'block'});
        $('.flecha').on('click', function(){
            // Ocultamos el anterior
            $('.ocultar').hide();
            // Creamos el enlace que contiene los id de los eventos
            let enlace = $(this).attr('href');
            $(enlace).css({'display':'block'});
            $(enlace).fadeIn(1000);
            
            return false;
        });
    }
}); 
