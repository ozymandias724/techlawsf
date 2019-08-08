/**
*  The Main JS File
*/
// get libraries
import $ from 'jquery';                         // latest jquery prereq

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




    

});