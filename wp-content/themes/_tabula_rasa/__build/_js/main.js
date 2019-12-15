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
        slidesToShow: 3,
        arrows: false,
        // centerMode: true,
        // centerPadding: 0,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [{
          breakpoint: 1280,
          settings: {
            slidesToShow: 2
          }
        }, {
          breakpoint: 960,
          settings: {
            slidesToShow: 1
          }
        }]
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJfX3ByZS9fanMvbWFpbi5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTs7O0FDQUE7Ozs7QUFLQyxXQUFVLENBQVYsRUFBYSxNQUFiLEVBQXFCLFFBQXJCLEVBQStCO0FBRTVCOzs7QUFHQSxFQUFBLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVSxFQUFWLENBQWEsb0JBQWIsRUFBbUMsVUFBVSxDQUFWLEVBQWE7QUFHNUM7QUFDQTtBQUNBLFFBQUksQ0FBQyxDQUFDLElBQUYsSUFBVSxRQUFWLElBQXNCLENBQUMsQ0FBQyxJQUFGLElBQVUsTUFBcEMsRUFBNEM7QUFDeEMsVUFBSSxRQUFRLEdBQUcsQ0FBQyxDQUFDLGFBQUQsQ0FBaEI7O0FBQ0EsV0FBSyxJQUFJLENBQUMsR0FBRyxDQUFiLEVBQWdCLENBQUMsR0FBRyxRQUFRLENBQUMsTUFBN0IsRUFBcUMsQ0FBQyxFQUF0QyxFQUEwQztBQUN0QyxZQUFNLE9BQU8sR0FBRyxRQUFRLENBQUMsQ0FBRCxDQUF4Qjs7QUFDQSxZQUFJLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVSxTQUFWLEtBQXdCLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVSxNQUFWLEVBQXhCLEdBQThDLENBQUMsQ0FBQyxPQUFELENBQUQsQ0FBVyxNQUFYLEdBQW9CLEdBQXBCLEdBQTBCLEdBQTVFLEVBQWtGO0FBQzlFLFVBQUEsQ0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXLFdBQVgsQ0FBdUIsOERBQXZCO0FBQ0g7QUFDSjs7QUFFRCxVQUFJLENBQUMsQ0FBQyxzQkFBRCxDQUFELENBQTBCLE1BQTlCLEVBQXNDO0FBQ2xDLFlBQUksQ0FBQyxDQUFDLE1BQUQsQ0FBRCxDQUFVLFNBQVYsTUFBeUIsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQixXQUFuQixFQUE3QixFQUErRDtBQUMzRCxVQUFBLENBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUIsUUFBbkIsQ0FB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Q0FBQyxJQUFELENBQUQsQ0FBUSxRQUFSLENBQWlCLFdBQWpCLENBQVgsR0FBMkMsYUFBbEQ7QUFDSCxTQUZEO0FBR0gsT0FQRDtBQVNBLE1BQUEsQ0FBQyxDQUFDLGlDQUFELENBQUQsQ0FBcUMsS0FBckMsQ0FBMkM7QUFDdkMsUUFBQSxZQUFZLEVBQUUsQ0FEeUI7QUFFdkMsUUFBQSxNQUFNLEVBQUUsS0FGK0I7QUFHdkM7QUFDQTtBQUNBLFFBQUEsUUFBUSxFQUFFLElBTDZCO0FBTXZDLFFBQUEsYUFBYSxFQUFFLElBTndCO0FBT3ZDLFFBQUEsVUFBVSxFQUFFLENBQUM7QUFFTCxVQUFBLFVBQVUsRUFBRSxJQUZQO0FBR0wsVUFBQSxRQUFRLEVBQUU7QUFDTixZQUFBLFlBQVksRUFBRTtBQURSO0FBSEwsU0FBRCxFQVFSO0FBRUksVUFBQSxVQUFVLEVBQUUsR0FGaEI7QUFHSSxVQUFBLFFBQVEsRUFBRTtBQUNOLFlBQUEsWUFBWSxFQUFFO0FBRFI7QUFIZCxTQVJRO0FBUDJCLE9BQTNDO0FBeUJILEtBckZTLENBdUZWOzs7QUFDQSxRQUFJLENBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CLE1BQXhCLEVBQWdDO0FBQzVCO0FBQ0EsTUFBQSxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQixhQUFwQixDQUFrQztBQUM5QixRQUFBLElBQUksRUFBRSxNQUR3QjtBQUU5QixRQUFBLFdBQVcsRUFBRSx3SEFGaUI7QUFHOUIsUUFBQSxtQkFBbUIsRUFBRSxLQUhTO0FBSTlCLFFBQUEsY0FBYyxFQUFFLElBSmM7QUFLOUIsUUFBQSxTQUFTLEVBQUU7QUFMbUIsT0FBbEM7QUFPSDtBQUlKLEdBckdBLENBQUQ7QUF1R0gsQ0FsSkEsRUFrSkMsTUFBTSxDQUFDLE1BbEpSLEVBa0pnQixNQWxKaEIsRUFrSndCLFFBbEp4QixDQUFEIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24oKXtmdW5jdGlvbiByKGUsbix0KXtmdW5jdGlvbiBvKGksZil7aWYoIW5baV0pe2lmKCFlW2ldKXt2YXIgYz1cImZ1bmN0aW9uXCI9PXR5cGVvZiByZXF1aXJlJiZyZXF1aXJlO2lmKCFmJiZjKXJldHVybiBjKGksITApO2lmKHUpcmV0dXJuIHUoaSwhMCk7dmFyIGE9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitpK1wiJ1wiKTt0aHJvdyBhLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsYX12YXIgcD1uW2ldPXtleHBvcnRzOnt9fTtlW2ldWzBdLmNhbGwocC5leHBvcnRzLGZ1bmN0aW9uKHIpe3ZhciBuPWVbaV1bMV1bcl07cmV0dXJuIG8obnx8cil9LHAscC5leHBvcnRzLHIsZSxuLHQpfXJldHVybiBuW2ldLmV4cG9ydHN9Zm9yKHZhciB1PVwiZnVuY3Rpb25cIj09dHlwZW9mIHJlcXVpcmUmJnJlcXVpcmUsaT0wO2k8dC5sZW5ndGg7aSsrKW8odFtpXSk7cmV0dXJuIG99cmV0dXJuIHJ9KSgpIiwiLyoqXHJcbiAqIE1haW4gSlNcclxuICogXHJcbiAqL1xyXG5cclxuKGZ1bmN0aW9uICgkLCB3aW5kb3csIGRvY3VtZW50KSB7XHJcblxyXG4gICAgLyoqXHJcbiAgICAgKiAgIEZpcmUgSW1tZWRpYXRlbHkgXHJcbiAgICAgKi9cclxuICAgICQod2luZG93KS5vbignbG9hZCByZXNpemUgc2Nyb2xsJywgZnVuY3Rpb24gKGUpIHtcclxuXHJcblxyXG4gICAgICAgIC8vICB3aW5kb3cgc2Nyb2xsIG9yIGxvYWQsXHJcbiAgICAgICAgLy8gIGkuZS4sIGZhZGUgaW4gYW5pbWF0aW9uc1xyXG4gICAgICAgIGlmIChlLnR5cGUgPT0gJ3Njcm9sbCcgfHwgZS50eXBlID09ICdsb2FkJykge1xyXG4gICAgICAgICAgICBsZXQgZWxlbWVudHMgPSAkKCcuYW5pbV9fZmFkZScpO1xyXG4gICAgICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IGVsZW1lbnRzLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgICAgICBjb25zdCBlbGVtZW50ID0gZWxlbWVudHNbaV07XHJcbiAgICAgICAgICAgICAgICBpZiAoJCh3aW5kb3cpLnNjcm9sbFRvcCgpICsgJCh3aW5kb3cpLmhlaWdodCgpID4gKCQoZWxlbWVudCkub2Zmc2V0KCkudG9wICsgMTAwKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICQoZWxlbWVudCkucmVtb3ZlQ2xhc3MoJ2FuaW1fX2ZhZGUtdXAgYW5pbV9fZmFkZS1pbiBhbmltX19mYWRlLWxlZnQgYW5pbV9fZmFkZS1yaWdodCcpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpZiAoJCgnaGVhZGVyLmhlYWRlci5mYWRlaW4nKS5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgIGlmICgkKHdpbmRvdykuc2Nyb2xsVG9wKCkgPj0gJCgnaGVhZGVyLmhlYWRlcicpLmlubmVySGVpZ2h0KCkpIHtcclxuICAgICAgICAgICAgICAgICAgICAkKCdoZWFkZXIuaGVhZGVyJykuYWRkQ2xhc3MoJ2JnX19mYWRlLWluJyk7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICQoJ2hlYWRlci5oZWFkZXInKS5yZW1vdmVDbGFzcygnYmdfX2ZhZGUtaW4nKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIC8vIHdpbmRvdyByZXNpemVcclxuICAgICAgICBpZiAoZS50eXBlID09ICdyZXNpemUnKSB7XHJcbiAgICAgICAgICAgIGlmICgkKCdoZWFkZXIgLmNvbnRhaW5lci5tb2JpbGVuYXYtb3BlbmVkJykubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAkKCdoZWFkZXIgLmNvbnRhaW5lci5tb2JpbGVuYXYtb3BlbmVkJykucmVtb3ZlQ2xhc3MoJ21vYmlsZW5hdi1vcGVuZWQnKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICAvLyBoYW5kbGUgXHJcbiAgICAgICAgaWYgKGUudHlwZSA9PSAnc2Nyb2xsJykge31cclxuICAgIH0pO1xyXG5cclxuXHJcbiAgICAvKipcclxuICAgICAqICAgalF1ZXJ5IERvY3VtZW50IFJlYWR5XHJcbiAgICAgKi9cclxuICAgICQoZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICAgICAvLyByZW1vdmUgdGhlIG5vLWpzIGNsYXNzIGZyb20gPGh0bWw+XHJcbiAgICAgICAgJCgnaHRtbCcpLnJlbW92ZUNsYXNzKCduby1qcycpO1xyXG5cclxuXHJcblxyXG4gICAgICAgIC8vIG9mZnNldCA8bWFpbj4gYnkgPGhlYWRlcj4gaGVpZ2h0XHJcbiAgICAgICAgLy8gaWYoICQoJ2JvZHk6bm90KC5oZWFkZXItZmFkZWluKScpLmxlbmd0aCApe1xyXG4gICAgICAgIC8vICAgICAkKCdib2R5Om5vdCguaGVhZGVyLWZhZGVpbikgbWFpbicpLmNzcygnbWFyZ2luLXRvcCcsICQoJ2hlYWRlcicpLmlubmVySGVpZ2h0KCkpO1xyXG4gICAgICAgIC8vIH1cclxuXHJcblxyXG5cclxuICAgICAgICAvLyBtb2JpbGUgbmF2XHJcbiAgICAgICAgaWYgKCQoJ2hlYWRlciAubmF2aWNvbnMnKS5sZW5ndGgpIHtcclxuXHJcblxyXG4gICAgICAgICAgICAkKCdoZWFkZXInKS5vbignY2xpY2snLCAnLm5hdmljb25zJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgICAgICQodGhpcykucGFyZW50cygnLmNvbnRhaW5lcicpLnRvZ2dsZUNsYXNzKCdtb2JpbGVuYXYtb3BlbmVkJylcclxuICAgICAgICAgICAgfSk7XHJcblxyXG5cclxuICAgICAgICAgICAgJCgnaGVhZGVyJykub24oJ2NsaWNrJywgJy5uYXZsaW5rcycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAvLyBjaGVjayB0aGUgbW9iaWxlIG5hdiBpcyBvcGVuXHJcbiAgICAgICAgICAgICAgICBpZiAoJCgnaGVhZGVyIC5jb250YWluZXIubW9iaWxlbmF2LW9wZW5lZCcpLmxlbmd0aCAmJiAkKCdoZWFkZXIgLm5hdmxpbmtzJykuY3NzKCdwb3NpdGlvbicpID09ICdmaXhlZCcpIHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoISQoZS50YXJnZXQpLmNsb3Nlc3QoJy5uYXZsaW5rcyA+IHVsJykubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJ2hlYWRlciAuY29udGFpbmVyJykucmVtb3ZlQ2xhc3MoJ21vYmlsZW5hdi1vcGVuZWQnKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuXHJcblxyXG5cclxuICAgICAgICAvKipcclxuICAgICAgICAgKiBDbGllbnQgU3BvdGxpZ2h0IEJhbm5lciAoSG9tZSBQYWdlKVxyXG4gICAgICAgICAqL1xyXG4gICAgICAgIGlmICgkKCcuY2xpZW50X3Nwb3RsaWdodC1iYW5uZXIgPiB1bCcpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAkKCcuY2xpZW50X3Nwb3RsaWdodC1iYW5uZXIgPiB1bCcpLnNsaWNrKHtcclxuICAgICAgICAgICAgICAgIGF1dG9wbGF5OiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgYXV0b3BsYXlTcGVlZDogNDAwMCxcclxuICAgICAgICAgICAgICAgIHNsaWRlc1RvU2hvdzogNSxcclxuICAgICAgICAgICAgICAgIGNlbnRlck1vZGU6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBjZW50ZXJQYWRkaW5nOiAwLFxyXG4gICAgICAgICAgICAgICAgYXJyb3dzOiBmYWxzZVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIC8vIGlmIHRoZXJlIGFyZSBjbGllbnRzIG9uIHRoZSBwYWdlXHJcbiAgICAgICAgaWYgKCQoJy5ibG9ja19fY29udGVudF9ncmlkIHVsLmNsaWVudHMnKS5sZW5ndGgpIHtcclxuICAgICAgICAgICAgJCgnLnBhZ2UtY2xpZW50cyAuYmxvY2tfX2NvbnRlbnRfZ3JpZCAuZmlsdGVycycpLm9uKCdjbGljaycsICdhJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgICAgIHZhciBmaWx0ZXJDbGFzcyA9ICQodGhpcykuYXR0cignZGF0YS10ZXJtJyk7XHJcbiAgICAgICAgICAgICAgICB2YXIgaXNSZXNldCA9ICgkKHRoaXMpLmF0dHIoJ2RhdGEtdGVybScpID09ICdhbGwnKTtcclxuICAgICAgICAgICAgICAgICQoJy5ibG9ja19fY29udGVudF9ncmlkIHVsLmNsaWVudHMnKS5zbGljaygnc2xpY2tVbmZpbHRlcicpO1xyXG4gICAgICAgICAgICAgICAgJCgnLmJsb2NrX19jb250ZW50X2dyaWQgdWwuY2xpZW50cycpLnNsaWNrKCdzbGlja0ZpbHRlcicsIGZ1bmN0aW9uIChpLCBlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuICFpc1Jlc2V0ID8gJCh0aGlzKS5oYXNDbGFzcyhmaWx0ZXJDbGFzcykgOiAnc2xpY2stc2xpZGUnO1xyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgJCgnLmJsb2NrX19jb250ZW50X2dyaWQgdWwuY2xpZW50cycpLnNsaWNrKHtcclxuICAgICAgICAgICAgICAgIHNsaWRlc1RvU2hvdzogMyxcclxuICAgICAgICAgICAgICAgIGFycm93czogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAvLyBjZW50ZXJNb2RlOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgLy8gY2VudGVyUGFkZGluZzogMCxcclxuICAgICAgICAgICAgICAgIGF1dG9wbGF5OiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgYXV0b3BsYXlTcGVlZDogNDAwMCxcclxuICAgICAgICAgICAgICAgIHJlc3BvbnNpdmU6IFt7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBicmVha3BvaW50OiAxMjgwLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBzZXR0aW5nczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2xpZGVzVG9TaG93OiAyLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAge1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgYnJlYWtwb2ludDogOTYwLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBzZXR0aW5nczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2xpZGVzVG9TaG93OiAxLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIF1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICAvLyBpZiB0aGVyZSBhcmUgYmlvIHBvcHVwcyBvbiB0aGUgcGFnZVxyXG4gICAgICAgIGlmICgkKCcuanNfX3BvcHVwX2JpbycpLmxlbmd0aCkge1xyXG4gICAgICAgICAgICAvLyBvcGVuIHRoZSBiaW8gcG9wdXAgb24gY2xpY2tcclxuICAgICAgICAgICAgJCgnLmpzX19wb3B1cF9iaW8nKS5tYWduaWZpY1BvcHVwKHtcclxuICAgICAgICAgICAgICAgIHR5cGU6IFwiYWpheFwiLFxyXG4gICAgICAgICAgICAgICAgY2xvc2VNYXJrdXA6ICc8YnV0dG9uIHRpdGxlPVwiQ2xvc2UgbGlnaHRib3ggKEVzYylcIiBhcmlhLWxhYmVsPVwiQ2xvc2UgbGlnaHRib3ggKEVzYylcIiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJtZnAtY2xvc2VcIj4mIzIxNTs8L2J1dHRvbj4nLFxyXG4gICAgICAgICAgICAgICAgY2xvc2VPbkNvbnRlbnRDbGljazogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBjbG9zZU9uQmdDbGljazogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIG1haW5DbGFzczogJ2JpbydcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuXHJcblxyXG4gICAgfSk7XHJcblxyXG59KHdpbmRvdy5qUXVlcnksIHdpbmRvdywgZG9jdW1lbnQpKTsiXX0=
