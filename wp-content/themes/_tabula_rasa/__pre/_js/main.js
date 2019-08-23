// 
// 
// 
// 
// 
// 
// import libraries
import $ from 'jquery';
import magnific from 'magnific-popup';
// 
// 
// when the script is loaded...

// do something...

// 
// 
// when the document is ready...
$(document).ready(function(){
    // 
    // 
    //  run these scripts when the DOM is fully loaded


    // remove the no-js class from <html>
    $('html').removeClass('no-js');
    
    // offset <main> by <header> height
    $('main').css('margin-top', $('header').innerHeight() );
    


    // if there are clients on the page
    if ($('.js__clients-client').length ){

        $('section.clients').on('click', '.js__clients-client', function(e){

            $(this).toggleClass('active');
            $(this).children('div:not(:first-child)').slideToggle(250);

        });

    }
    
    
    
    // if there are bio popups on the page
    if( $('.js__popup_bio').length ){

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