// 
// 
// 
// 
// 
// 
// import libraries
import $ from 'jquery';
import Magnific from 'magnific-popup';
// import Slick from 'slick-carousel-browserify/';
// 
// 
// when the script is loaded...

// do something...
$(window).on('load resize scroll', function (e) {

    //  window scroll or load,
    //  i.e., fade in animations
    if (e.type == 'scroll' || e.type == 'load') {
        let elements = $('.anim__fade');
        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];
            if ($(window).scrollTop() + $(window).height() > ($(element).offset().top + 100)) {
                $(element).removeClass('anim__fade-up anim__fade-in anim__fade-left anim__fade-right');
            }
        }

        if ($('header.header.fadein').length) {
            if ($(window).scrollTop() >= $('header.header').innerHeight()) {
                $('header.header').addClass('bg__fade-in');
            } else {
                $('header.header').removeClass('bg__fade-in');
            }
        }

    }

    // window resize
    if (e.type == 'resize') {
        if ($('header .container.mobilenav-opened').length) {
            $('header .container.mobilenav-opened').removeClass('mobilenav-opened');
        }
    }
    // handle 
    if( e.type == 'scroll' ){

        
    }
});
// 
// 
// when the document is ready...
$(document).ready(function () {
    // 
    // 
    //  run these scripts when the DOM is fully loaded


    // remove the no-js class from <html>
    $('html').removeClass('no-js');




    // offset <main> by <header> height
    if( $('body:not(.header-fadein)').length ){
        $('body:not(.header-fadein) main').css('margin-top', $('header').innerHeight());
    }



    // mobile nav
    if ($('header .navicons').length) {


        $('header').on('click', '.navicons', function (e) {
            $(this).parents('.container').toggleClass('mobilenav-opened')
        });


        $('header').on('click', '.navlinks', function (e) {
            // check the mobile nav is open
            if ($('header .container.mobilenav-opened').length && $('header .navlinks').css('position') == 'fixed') {
                if (!$(e.target).closest('.navlinks > ul').length) {
                    $('header .container').removeClass('mobilenav-opened');
                }
            }
        });
    }




    // if there are clients on the page
    if ($('.js__clients-filter-item').length) {

        $('div.filters').on('click', '.js__clients-filter-item', function (e) {

            var toShow = $(this).attr('href').replace('#', '');
            

            $('ul.clients > li.grid_item:not([data-term="'+toShow+'"])').hide();
            $('ul.clients > li.grid_item').css('order', '2');
            $('ul.clients > li.grid_item').each(function(i, el){
                $(el).css('order', 1);
            });
            $('ul.clients > li.grid_item[data-term="'+toShow+'"]').show();



        });

    }



    // if there are bio popups on the page
    if ($('.js__popup_bio').length) {

        // open the bio popup on click
        $('.js__popup_bio').magnificPopup({
            type: "ajax",
            closeMarkup: '<button title="Close lightbox (Esc)" aria-label="Close lightbox (Esc)" type="button" class="mfp-close">&#215;</button>',
            closeOnContentClick: false,
            closeOnBgClick: true,
            mainClass: 'bio'
        });
    }
    


}); // end $.ready