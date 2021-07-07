import svg4everybody from 'svg4everybody';
// import Swup from 'swup';
// import SwupBodyClassPlugin from '@swup/body-class-plugin';
// import SwupScrollPlugin from '@swup/scroll-plugin';
// import SwupFadeTheme from '@swup/fade-theme';

// import SwupPreloadPlugin from '@swup/preload-plugin';
// import SwupScriptsPlugin from '@swup/scripts-plugin';

import storesSlider from '../../blocks/stores/stores';

import Nav from '../../blocks/nav/nav';


(function ($) {

    svg4everybody();


    let styles = [
      'padding: 2px 9px',
      'background: #1b1e64',
      'color: #fff',
      'display: inline-block',
      'box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.2) inset, 0 5px 3px -5px rgba(0, 0, 0, 0.5), 0 -13px 5px -10px rgba(255, 255, 255, 0.4) inset',
      'line-height: 1.52',
      'text-align: left',
      'font-size: 14px',
      'font-weight: 400'
    ].join(';');

    console.log('%c developed by igor gorlov https://gorlov.gq', styles);

    /**
     * Scroll animation
     */

    // AOS.init({
    //   duration: 1200,
    //   startEvent: 'DOMContentLoaded',
    // });


    /**
     * Nav
     */

    const nav = new Nav()

    /*
      Stores
    */

    const gamesSlider = storesSlider();


    function growTextarea (i,elem) {
    var elem = $(elem);
    var resizeTextarea = function( elem ) {
        var scrollLeft = window.pageXOffset || (document.documentElement || document.body.parentNode || document.body).scrollLeft;
        var scrollTop  = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
        elem.css('height', 'auto').css('height', elem.prop('scrollHeight') );
          window.scrollTo(scrollLeft, scrollTop);
      };
      elem.on('input', function() {
        resizeTextarea( $(this) );
      });
      resizeTextarea( $(elem) );
  }

  $('.form__textarea').each(growTextarea);


  $('.header__contact').on('click', function(e) {
    var _scroll = $(this).attr('href');
    if (_scroll != '#' && $(_scroll).length) {
      $('html, body').animate({ scrollTop: $(_scroll).offset().top - 50 }, 800);
    }
  });



})(jQuery);
