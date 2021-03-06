/**
*   *   Main Theme Scripts  *
* 
*/

/**
 * *    iife to pass jquery and other args
 * @param {*} $ 
 * @param {*} window 
 * @param {*} document 
 */
(
    function ($, window, document){

        /**
         *   Fire Immediately 
         */
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
            if (e.type == 'scroll') {}
        });


        /**
         *   jQuery Document Ready
         */
        $(function () {

            // remove the no-js class from <html>
            $('html').removeClass('no-js');



            // offset <main> by <header> height
            // if( $('body:not(.header-fadein)').length ){
            //     $('body:not(.header-fadein) main').css('margin-top', $('header').innerHeight());
            // }



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



            /**
             * Client Spotlight Banner (Home Page)
             */
            if ($('.client_spotlight-banner').length) {
                $('.client_spotlight-banner').slick({
                    autoplay: true,
                    autoplaySpeed: 4000,
                    slidesToShow: 5,
                    centerMode: true,
                    centerPadding: 0,
                    rows: 0, // * this is super important!!! * without this there are BUGS ***
                    arrows: false,
                    responsive: [{
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: 3,
                        }
                    }, {
                        breakpoint: 960,
                        settings: {
                            slidesToShow: 2,
                        }
                    }, {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                        }
                    }],
                });
            }

            // if there are clients on the page
            if ($('.block__content_grid ul.clients').length) {


                $('.page-clients .block__content_grid .filters').on('click', 'a', function (e) {

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var filterClass = $(this).attr('data-term');

                    var isReset = ($(this).attr('data-term') == 'all');

                    if (isReset) {
                        window.location.hash = '';
                    }

                    $('.block__content_grid ul.clients').slick('slickUnfilter');
                    $('.block__content_grid ul.clients').slick('slickFilter', function (i, e) {
                        return !isReset ? $(this).hasClass(filterClass) : 'slick-slide';
                    });

                });

                $('.block__content_grid ul.clients').slick({
                    slidesToShow: 3,
                    arrows: false,
                    centerMode: true,
                    centerPadding: 0,
                    // autoplay: true,
                    autoplaySpeed: 4000,
                    responsive: [{
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: 2,
                        }
                    }, {
                        breakpoint: 960,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false
                        }
                    }],
                });


                if (window.location.hash) {
                    setTimeout(() => {
                        $('.page-clients .block__content_grid .filters > a').removeClass('active');
                        $('.page-clients .block__content_grid .filters > a[data-term="' + window.location.href.split('#')[1] + '"]').addClass('active');
                        $('.block__content_grid ul.clients').slick('slickUnfilter');
                        $('.block__content_grid ul.clients').slick('slickFilter', function (i, e) {
                            if ($(this).hasClass(window.location.href.split('#')[1])) {
                                return true;
                            }
                        });
                        $('.block__content_grid ul.clients').slick('refresh');
                    }, 250);
                }
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



        });

    }
    // 
    (window.jQuery, window, document)
);