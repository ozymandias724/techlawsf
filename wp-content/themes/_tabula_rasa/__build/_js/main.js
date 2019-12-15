(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

/**
 * Main JS
 * 
*/
(function ($, window, document) {
  /**
  *   Fire Immediately 
  */
  $(window).on('load resize scroll', function (e) {
    //  window scroll or load,
    //  i.e., fade in animations
    if (e.type == 'scroll' || e.type == 'load') {
      var elements = $('.anim__fade');

      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];

        if ($(window).scrollTop() + $(window).height() > $(element).offset().top + 100) {
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
    } // window resize


    if (e.type == 'resize') {
      if ($('header .container.mobilenav-opened').length) {
        $('header .container.mobilenav-opened').removeClass('mobilenav-opened');
      }
    } // handle 


    if (e.type == 'scroll') {}
  });
  /**
  *   jQuery Document Ready
  */

  $(function () {
    // remove the no-js class from <html>
    $('html').removeClass('no-js'); // offset <main> by <header> height
    // if( $('body:not(.header-fadein)').length ){
    //     $('body:not(.header-fadein) main').css('margin-top', $('header').innerHeight());
    // }
    // mobile nav

    if ($('header .navicons').length) {
      $('header').on('click', '.navicons', function (e) {
        $(this).parents('.container').toggleClass('mobilenav-opened');
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


    if ($('.client_spotlight-banner > ul').length) {
      $('.client_spotlight-banner > ul').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 5,
        centerMode: true,
        centerPadding: 0,
        arrows: false
      });
    } // if there are clients on the page


    if ($('.block__content_grid ul.clients').length) {
      $('.page-clients .block__content_grid .filters').on('click', 'a', function (e) {
        var filterClass = $(this).attr('data-term');
        var isReset = $(this).attr('data-term') == 'all';
        $('.block__content_grid ul.clients').slick('slickUnfilter');
        $('.block__content_grid ul.clients').slick('slickFilter', function (i, e) {
          return !isReset ? $(this).hasClass(filterClass) : 'slick-slide';
        });
      });
      $('.block__content_grid ul.clients').slick({
        slidesToShow: 5,
        centerMode: true,
        centerPadding: 0,
        autoplay: true,
        autoplaySpeed: 4000
      });
    } // if there are bio popups on the page


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
})(window.jQuery, window, document);

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJfX3ByZS9fanMvbWFpbi5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7O0FDQUE7Ozs7QUFLQyxXQUFVLENBQVYsRUFBYSxNQUFiLEVBQXFCLFFBQXJCLEVBQThCO0FBRS9COzs7QUFHSSxFQUFBLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVSxFQUFWLENBQWEsb0JBQWIsRUFBbUMsVUFBVSxDQUFWLEVBQWE7QUFHNUM7QUFDQTtBQUNBLFFBQUksQ0FBQyxDQUFDLElBQUYsSUFBVSxRQUFWLElBQXNCLENBQUMsQ0FBQyxJQUFGLElBQVUsTUFBcEMsRUFBNEM7QUFDeEMsVUFBSSxRQUFRLEdBQUcsQ0FBQyxDQUFDLGFBQUQsQ0FBaEI7O0FBQ0EsV0FBSyxJQUFJLENBQUMsR0FBRyxDQUFiLEVBQWdCLENBQUMsR0FBRyxRQUFRLENBQUMsTUFBN0IsRUFBcUMsQ0FBQyxFQUF0QyxFQUEwQztBQUN0QyxZQUFNLE9BQU8sR0FBRyxRQUFRLENBQUMsQ0FBRCxDQUF4Qjs7QUFDQSxZQUFJLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVSxTQUFWLEtBQXdCLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVSxNQUFWLEVBQXhCLEdBQThDLENBQUMsQ0FBQyxPQUFELENBQUQsQ0FBVyxNQUFYLEdBQW9CLEdBQXBCLEdBQTBCLEdBQTVFLEVBQWtGO0FBQzlFLFVBQUEsQ0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXLFdBQVgsQ0FBdUIsOERBQXZCO0FBQ0g7QUFDSjs7QUFFRCxVQUFJLENBQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCLE1BQTlCLEVBQXNDO0FBQ2xDLFlBQUksQ0FBQyxDQUFDLE1BQUQsQ0FBRCxDQUFVLFNBQVYsTUFBeUIsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQixXQUFuQixFQUE3QixFQUErRDtBQUMzRCxVQUFBLENBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUIsUUFBbkIsQ0FB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QUFDLElBQUQsQ0FBRCxDQUFRLFFBQVIsQ0FBaUIsV0FBakIsQ0FBWCxHQUEyQyxhQUFsRDtBQUVILFNBSEQ7QUFJSCxPQVJEO0FBVUEsTUFBQSxDQUFDLENBQUMsaUNBQUQsQ0FBRCxDQUFxQyxLQUFyQyxDQUEyQztBQUN2QyxRQUFBLFlBQVksRUFBRyxDQUR3QjtBQUV0QyxRQUFBLFVBQVUsRUFBRyxJQUZ5QjtBQUd0QyxRQUFBLGFBQWEsRUFBRyxDQUhzQjtBQUl0QyxRQUFBLFFBQVEsRUFBRyxJQUoyQjtBQUt0QyxRQUFBLGFBQWEsRUFBRztBQUxzQixPQUEzQztBQU9ILEtBcEVPLENBc0VSOzs7QUFDQSxRQUFJLENBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CLE1BQXhCLEVBQWdDO0FBQzVCO0FBQ0EsTUFBQSxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQixhQUFwQixDQUFrQztBQUM5QixRQUFBLElBQUksRUFBRSxNQUR3QjtBQUU5QixRQUFBLFdBQVcsRUFBRSx3SEFGaUI7QUFHOUIsUUFBQSxtQkFBbUIsRUFBRSxLQUhTO0FBSTlCLFFBQUEsY0FBYyxFQUFFLElBSmM7QUFLOUIsUUFBQSxTQUFTLEVBQUU7QUFMbUIsT0FBbEM7QUFPSDtBQUlKLEdBcEZBLENBQUQ7QUFzRkgsQ0FqSUEsRUFpSUMsTUFBTSxDQUFDLE1BaklSLEVBaUlnQixNQWpJaEIsRUFpSXdCLFFBakl4QixDQUFEIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKXtmdW5jdGlvbiByKGUsbix0KXtmdW5jdGlvbiBvKGksZil7aWYoIW5baV0pe2lmKCFlW2ldKXt2YXIgYz1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlO2lmKCFmJiZjKXJldHVybiBjKGksITApO2lmKHUpcmV0dXJuIHUoaSwhMCk7dmFyIGE9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitpK1wiJ1wiKTt0aHJvdyBhLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsYX12YXIgcD1uW2ldPXtleHBvcnRzOnt9fTtlW2ldWzBdLmNhbGwocC5leHBvcnRzLGZ1bmN0aW9uKHIpe3ZhciBuPWVbaV1bMV1bcl07cmV0dXJuIG8obnx8cil9LHAscC5leHBvcnRzLHIsZSxuLHQpfXJldHVybiBuW2ldLmV4cG9ydHN9Zm9yKHZhciB1PVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmUsaT0wO2k8dC5sZW5ndGg7aSsrKW8odFtpXSk7cmV0dXJuIG99cmV0dXJuIHJ9KSgpIiwiLyoqXHJcbiAqIE1haW4gSlNcclxuICogXHJcbiovXHJcblxyXG4oZnVuY3Rpb24gKCQsIHdpbmRvdywgZG9jdW1lbnQpe1xyXG5cclxuLyoqXHJcbiogICBGaXJlIEltbWVkaWF0ZWx5IFxyXG4qL1xyXG4gICAgJCh3aW5kb3cpLm9uKCdsb2FkIHJlc2l6ZSBzY3JvbGwnLCBmdW5jdGlvbiAoZSkge1xyXG5cclxuXHJcbiAgICAgICAgLy8gIHdpbmRvdyBzY3JvbGwgb3IgbG9hZCxcclxuICAgICAgICAvLyAgaS5lLiwgZmFkZSBpbiBhbmltYXRpb25zXHJcbiAgICAgICAgaWYgKGUudHlwZSA9PSAnc2Nyb2xsJyB8fCBlLnR5cGUgPT0gJ2xvYWQnKSB7XHJcbiAgICAgICAgICAgIGxldCBlbGVtZW50cyA9ICQoJy5hbmltX19mYWRlJyk7XHJcbiAgICAgICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgZWxlbWVudHMubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgICAgIGNvbnN0IGVsZW1lbnQgPSBlbGVtZW50c1tpXTtcclxuICAgICAgICAgICAgICAgIGlmICgkKHdpbmRvdykuc2Nyb2xsVG9wKCkgKyAkKHdpbmRvdykuaGVpZ2h0KCkgPiAoJChlbGVtZW50KS5vZmZzZXQoKS50b3AgKyAxMDApKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJChlbGVtZW50KS5yZW1vdmVDbGFzcygnYW5pbV9fZmFkZS11cCBhbmltX19mYWRlLWluIGFuaW1fX2ZhZGUtbGVmdCBhbmltX19mYWRlLXJpZ2h0Jyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGlmICgkKCdoZWFkZXIuaGVhZGVyLmZhZGVpbicpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKCQod2luZG93KS5zY3JvbGxUb3AoKSA+PSAkKCdoZWFkZXIuaGVhZGVyJykuaW5uZXJIZWlnaHQoKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICQoJ2hlYWRlci5oZWFkZXInKS5hZGRDbGFzcygnYmdfX2ZhZGUtaW4nKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnaGVhZGVyLmhlYWRlcicpLnJlbW92ZUNsYXNzKCdiZ19fZmFkZS1pbicpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy8gd2luZG93IHJlc2l6ZVxyXG4gICAgICAgIGlmIChlLnR5cGUgPT0gJ3Jlc2l6ZScpIHtcclxuICAgICAgICAgICAgaWYgKCQoJ2hlYWRlciAuY29udGFpbmVyLm1vYmlsZW5hdi1vcGVuZWQnKS5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgICQoJ2hlYWRlciAuY29udGFpbmVyLm1vYmlsZW5hdi1vcGVuZWQnKS5yZW1vdmVDbGFzcygnbW9iaWxlbmF2LW9wZW5lZCcpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIC8vIGhhbmRsZSBcclxuICAgICAgICBpZiAoZS50eXBlID09ICdzY3JvbGwnKSB7fVxyXG4gICAgfSk7XHJcblxyXG4gICAgXHJcbi8qKlxyXG4qICAgalF1ZXJ5IERvY3VtZW50IFJlYWR5XHJcbiovXHJcbiAgICAkKGZ1bmN0aW9uKCl7XHJcblxyXG4gICAgICAgIC8vIHJlbW92ZSB0aGUgbm8tanMgY2xhc3MgZnJvbSA8aHRtbD5cclxuICAgICAgICAkKCdodG1sJykucmVtb3ZlQ2xhc3MoJ25vLWpzJyk7XHJcblxyXG5cclxuXHJcbiAgICAgICAgLy8gb2Zmc2V0IDxtYWluPiBieSA8aGVhZGVyPiBoZWlnaHRcclxuICAgICAgICAvLyBpZiggJCgnYm9keTpub3QoLmhlYWRlci1mYWRlaW4pJykubGVuZ3RoICl7XHJcbiAgICAgICAgLy8gICAgICQoJ2JvZHk6bm90KC5oZWFkZXItZmFkZWluKSBtYWluJykuY3NzKCdtYXJnaW4tdG9wJywgJCgnaGVhZGVyJykuaW5uZXJIZWlnaHQoKSk7XHJcbiAgICAgICAgLy8gfVxyXG5cclxuXHJcblxyXG4gICAgICAgIC8vIG1vYmlsZSBuYXZcclxuICAgICAgICBpZiAoJCgnaGVhZGVyIC5uYXZpY29ucycpLmxlbmd0aCkge1xyXG5cclxuXHJcbiAgICAgICAgICAgICQoJ2hlYWRlcicpLm9uKCdjbGljaycsICcubmF2aWNvbnMnLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICAgICAgJCh0aGlzKS5wYXJlbnRzKCcuY29udGFpbmVyJykudG9nZ2xlQ2xhc3MoJ21vYmlsZW5hdi1vcGVuZWQnKVxyXG4gICAgICAgICAgICB9KTtcclxuXHJcblxyXG4gICAgICAgICAgICAkKCdoZWFkZXInKS5vbignY2xpY2snLCAnLm5hdmxpbmtzJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgICAgIC8vIGNoZWNrIHRoZSBtb2JpbGUgbmF2IGlzIG9wZW5cclxuICAgICAgICAgICAgICAgIGlmICgkKCdoZWFkZXIgLmNvbnRhaW5lci5tb2JpbGVuYXYtb3BlbmVkJykubGVuZ3RoICYmICQoJ2hlYWRlciAubmF2bGlua3MnKS5jc3MoJ3Bvc2l0aW9uJykgPT0gJ2ZpeGVkJykge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICghJChlLnRhcmdldCkuY2xvc2VzdCgnLm5hdmxpbmtzID4gdWwnKS5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJCgnaGVhZGVyIC5jb250YWluZXInKS5yZW1vdmVDbGFzcygnbW9iaWxlbmF2LW9wZW5lZCcpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuXHJcblxyXG4gICAgICAgIC8qKlxyXG4gICAgICAgICAqIENsaWVudCBTcG90bGlnaHQgQmFubmVyIChIb21lIFBhZ2UpXHJcbiAgICAgICAgICovXHJcbiAgICAgICAgaWYoICQoJy5jbGllbnRfc3BvdGxpZ2h0LWJhbm5lciA+IHVsJykubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICQoJy5jbGllbnRfc3BvdGxpZ2h0LWJhbm5lciA+IHVsJykuc2xpY2soe1xyXG4gICAgICAgICAgICAgICAgYXV0b3BsYXk6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBhdXRvcGxheVNwZWVkOiA0MDAwLFxyXG4gICAgICAgICAgICAgICAgc2xpZGVzVG9TaG93OiA1LFxyXG4gICAgICAgICAgICAgICAgY2VudGVyTW9kZTogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIGNlbnRlclBhZGRpbmc6IDAsXHJcbiAgICAgICAgICAgICAgICBhcnJvd3M6IGZhbHNlXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy8gaWYgdGhlcmUgYXJlIGNsaWVudHMgb24gdGhlIHBhZ2VcclxuICAgICAgICBpZiAoJCgnLmJsb2NrX19jb250ZW50X2dyaWQgdWwuY2xpZW50cycpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAkKCcucGFnZS1jbGllbnRzIC5ibG9ja19fY29udGVudF9ncmlkIC5maWx0ZXJzJykub24oJ2NsaWNrJywgJ2EnLCBmdW5jdGlvbihlKXtcclxuICAgICAgICAgICAgICAgIHZhciBmaWx0ZXJDbGFzcyA9ICQodGhpcykuYXR0cignZGF0YS10ZXJtJyk7XHJcbiAgICAgICAgICAgICAgICB2YXIgaXNSZXNldCA9ICggJCh0aGlzKS5hdHRyKCdkYXRhLXRlcm0nKSA9PSAgJ2FsbCcpO1xyXG4gICAgICAgICAgICAgICAgJCgnLmJsb2NrX19jb250ZW50X2dyaWQgdWwuY2xpZW50cycpLnNsaWNrKCdzbGlja1VuZmlsdGVyJyk7XHJcbiAgICAgICAgICAgICAgICAkKCcuYmxvY2tfX2NvbnRlbnRfZ3JpZCB1bC5jbGllbnRzJykuc2xpY2soJ3NsaWNrRmlsdGVyJywgZnVuY3Rpb24oaSwgZSl7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuICFpc1Jlc2V0ID8gJCh0aGlzKS5oYXNDbGFzcyhmaWx0ZXJDbGFzcykgOiAnc2xpY2stc2xpZGUnO1xyXG4gICAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgJCgnLmJsb2NrX19jb250ZW50X2dyaWQgdWwuY2xpZW50cycpLnNsaWNrKHtcclxuICAgICAgICAgICAgICAgIHNsaWRlc1RvU2hvdyA6IDVcclxuICAgICAgICAgICAgICAgICxjZW50ZXJNb2RlIDogdHJ1ZVxyXG4gICAgICAgICAgICAgICAgLGNlbnRlclBhZGRpbmcgOiAwXHJcbiAgICAgICAgICAgICAgICAsYXV0b3BsYXkgOiB0cnVlXHJcbiAgICAgICAgICAgICAgICAsYXV0b3BsYXlTcGVlZCA6IDQwMDBcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICAvLyBpZiB0aGVyZSBhcmUgYmlvIHBvcHVwcyBvbiB0aGUgcGFnZVxyXG4gICAgICAgIGlmICgkKCcuanNfX3BvcHVwX2JpbycpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAvLyBvcGVuIHRoZSBiaW8gcG9wdXAgb24gY2xpY2tcclxuICAgICAgICAgICAgJCgnLmpzX19wb3B1cF9iaW8nKS5tYWduaWZpY1BvcHVwKHtcclxuICAgICAgICAgICAgICAgIHR5cGU6IFwiYWpheFwiLFxyXG4gICAgICAgICAgICAgICAgY2xvc2VNYXJrdXA6ICc8YnV0dG9uIHRpdGxlPVwiQ2xvc2UgbGlnaHRib3ggKEVzYylcIiBhcmlhLWxhYmVsPVwiQ2xvc2UgbGlnaHRib3ggKEVzYylcIiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJtZnAtY2xvc2VcIj4mIzIxNTs8L2J1dHRvbj4nLFxyXG4gICAgICAgICAgICAgICAgY2xvc2VPbkNvbnRlbnRDbGljazogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBjbG9zZU9uQmdDbGljazogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIG1haW5DbGFzczogJ2JpbydcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuXHJcblxyXG4gICAgfSk7XHJcblxyXG59KHdpbmRvdy5qUXVlcnksIHdpbmRvdywgZG9jdW1lbnQpKTsiXX0=
