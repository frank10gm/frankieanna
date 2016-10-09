// JavaScript Document
$(function() {

    //collegamento allo scorrimento della pagina
    $(window).bind('scroll', function(e) {
        //parallax();
        activeMenu();
    });

    //collegamento alla navbar
    $('.nav-link').bind('click', function(event) {
        var $anchor = $(this);
        //$('.navbar-collapse').collapse('hide');
        if ($('#menu-mobile').css('display') != 'none')
            $('.navbar-toggle').click();
        //console.log($anchor);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
        event.stopImmediatePropagation();
    });


    $('a.home').click(function() {

        $('html, body').animate({ scrollTop: 0 }, 1000,
            function() {

                parallax();

            });
        return false;

    });

    $('a.configurator').click(function() {

        $('html, body').animate({ scrollTop: $('#configurator').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;

    });

    $('a.servizi').click(function() {

        $('html, body').animate({ scrollTop: $('#servizi').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;

    });

    $('a.contatti').click(function() {

        $('html, body').animate({ scrollTop: $('#contatti').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;

    });


    $('a.login').click(function() {

        $('html, body').animate({ scrollTop: $('#login').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;
    });

    $('a.video').click(function() {

        $('html, body').animate({ scrollTop: $('#video').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;
    });

    $('a.photo').click(function() {

        $('html, body').animate({ scrollTop: $('#photo').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;
    });

    $('a.edit-profile').click(function() {

        $('html, body').animate({ scrollTop: $('#edit-profile').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;
    });

    $('a.community').click(function() {

        $('html, body').animate({ scrollTop: $('#community').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;
    });

    $('a.apparel').click(function() {

        $('html, body').animate({ scrollTop: $('#apparel').offset().top }, 1000,
            function() {

                parallax();

            });
        return false;
    });

});

function parallax() {

    var scrollPosition = $(window).scrollTop();
    $('#backgr').css('top', (0 - (scrollPosition * .2)) + 'px');
    //$('#immagini').css('top',(0 -(scrollPosition * .5)) + 'px');
}

function activeMenu() {

    var top = $(window).scrollTop();
    var mappa = $('#pianta').offset().top - 100;
    var chiSiamo = $('#chi-siamo').offset().top - 100;
    var programma = $('#f-programma').offset().top - 100;
    var lotteria = $('#lotteria').offset().top - 100;
    var concorso = $('#concorso').offset().top - 100;
    var talent = $('#talent').offset().top - 100;
    var video = $('#video').offset().top - 100;
    var sponsor = $('#sponsor').offset().top - 100;
    var giocone = $('#giocone').offset().top - 100;
    var caccia = $('#caccia').offset().top - 100;
    var laboratori = $('#f-laboratori').offset().top - 100;
    var mostre = $('#mostre').offset().top - 100;
    var gastro = $('#gastro').offset().top - 100;
    var scuole = $('#scuole').offset().top - 100;
    var contatti = $('#contatti').offset().top - 100;
    var comeArrivare = $('#f-come-arrivare').offset().top - 100;
    var cena = $('#cena').offset().top - 100;

    if (top >= 0) {
        $('.nav-link').removeClass('active');
        $('#menu-home').addClass('active');
    }

    if (top >= chiSiamo) {
        $('.nav-link').removeClass('active');
        $('#menu-chisiamo').addClass('active');
    }

    if (top >= programma) {
        $('.nav-link').removeClass('active');
        $('#menu-programma').addClass('active');
    }

    if (top >= mostre) {
        $('.nav-link').removeClass('active');
        $('#menu-mostre').addClass('active');
    }

    if (top >= concorso) {
        $('.nav-link').removeClass('active');
        $('#menu-concorso').addClass('active');
    }

    if (top >= talent) {
        $('.nav-link').removeClass('active');
        $('#menu-talent').addClass('active');
    }

    if (top >= giocone) {
        $('.nav-link').removeClass('active');
        $('#menu-giocone').addClass('active');
    }

    if (top >= caccia) {
        $('.nav-link').removeClass('active');
        $('#menu-caccia').addClass('active');
    }

    if (top >= laboratori) {
        $('.nav-link').removeClass('active');
        $('#menu-laboratori').addClass('active');
    }

    if (top >= cena) {
        $('.nav-link').removeClass('active');
        $('#menu-cena').addClass('active');
    }

    if (top >= gastro) {
        $('.nav-link').removeClass('active');
        $('#menu-gastro').addClass('active');
    }

    if (top >= video) {
        $('.nav-link').removeClass('active');
        $('#menu-video').addClass('active');
    }

    if (top >= mappa) {
        $('.nav-link').removeClass('active');
        $('#menu-mappa').addClass('active');
    }

    if (top >= comeArrivare) {
        $('.nav-link').removeClass('active');
        $('#menu-come-arrivare').addClass('active');
    }

    if (top >= scuole) {
        $('.nav-link').removeClass('active');
        $('#menu-scuole').addClass('active');
    }

    if (top >= lotteria) {
        $('.nav-link').removeClass('active');
        $('#menu-lotteria').addClass('active');
    }

    if (top >= sponsor) {
        $('.nav-link').removeClass('active');
        $('#menu-sponsor').addClass('active');
    }

    if (top >= contatti) {
        $('.nav-link').removeClass('active');
        $('#menu-contatti').addClass('active');
    }

}