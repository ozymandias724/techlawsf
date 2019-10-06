(function ($) {



    if ( $('.block__banner').length < 1 ) {

        // multiple banners
        

    }

    else if ($('.block__banner').length == 1 ) {


        // one banner


        $('.block__banner .flexgrid > ul').slick({
            autoplay: true
            ,autoplaySpeed: 7000
            ,slidesToShow: 5
            ,centerMode: true
            ,centerPadding: 0
        });
        
        

    }
    else {


        // no banners
        
    }
    
    
    
    

})(jQuery);