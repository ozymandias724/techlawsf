/**
*  The Main JS File
*/
// get libraries
import $ from 'jquery';                         // latest jquery prereq
import magnific from 'magnific-popup';
// import slick from 'slick-carousel-browserify';

// certain things should wait until the document is ready
$(document).ready(function()
{

    $('html').removeClass('no-js');


    
    $('main').css('margin-top', $('header').innerHeight() );

    
    
    if( $('header.header nav.navlinks').length ){
        
        // clicked link that is a parent (has children)
        $('nav.navlinks li.menu-item-has-children > a').on('click', function(e){

            $(this).parent('li').toggleClass('open');
        });

    }

    if( $('.js__popup_bio').length ){

        $('.js__popup_bio').magnificPopup({
            type: "ajax",
            closeMarkup: '<button title="Close lightbox (Esc)" aria-label="Close lightbox (Esc)" type="button" class="mfp-close">&#215;</button>',
            closeOnContentClick: false,
            closeOnBgClick: true,
            mainClass: 'bio'
        });
    }






    

});