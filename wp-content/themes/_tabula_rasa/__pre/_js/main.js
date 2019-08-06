/**
*  The Main JS File
*/
// get libraries
import $ from 'jquery';                         // latest jquery prereq

// certain things should wait until the document is ready
$(document).ready(function()
{
  
    Theme.MainNav = {

        _init : function(){

            
            if( $('header.header nav.navlinks').length ){
                
                // clicked link that is a parent (has children)
                $('nav.navlinks li.parent > a').on('click', Theme.MainNav._didClickParentLink);

            }
            
        },
        _didClickParentLink : function(e){
            $(this).parent('li').toggleClass('open');
        },
        
    };
    Theme.MainNav._init();

});