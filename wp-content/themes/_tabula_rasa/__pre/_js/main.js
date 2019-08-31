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


    // window.scrollTop = px from top of document the top of the viewport is
    // window.height = px the window is in height
    // el.offset().top = px from the top of the document the element is 
    // 

    if (e.type == 'scroll' || e.type == 'load') {

        let elements = $('.anim__fade');
        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];
            if ($(window).scrollTop() + $(window).height() > ($(element).offset().top + 100)) {
                $(element).removeClass('anim__fade-up anim__fade-in anim__fade-left anim__fade-right');
            }
        }

        

    }

    if (e.type == 'resize') {
        if ($('header .container.mobilenav-opened').length) {
            $('header .container.mobilenav-opened').removeClass('mobilenav-opened');
        }
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
    $('main').css('margin-top', $('header').innerHeight());



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
    if ($('.js__clients-client').length) {

        $('section.clients').on('click', '.js__clients-client', function (e) {

            $(this).toggleClass('active');
            $(this).children('div:not(:first-child)').slideToggle(250);

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