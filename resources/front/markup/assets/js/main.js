import svg4everybody from 'svg4everybody';
import Nav from '../../blocks/nav/nav';
import heroSlider from '../../blocks/hero/hero';
import feedbackSlider from '../../blocks/feedback/feedback';
import instaFeed from '../../blocks/instagram/instagram';


// import $ from 'jquery';

document.addEventListener('DOMContentLoaded', function () {

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

  console.log('%c developed by igor gorlov gorlov https://gorlov.gq', styles);


  /**
   * Nav
   */

  const nav = new Nav()


  /*
    Hero slider
  */

  const heroSlide = heroSlider()


  /*
    Feedback slider
  */

  const feedbackSlide = feedbackSlider()


  // instaFeed

  const instafeed = instaFeed()


  // Popup

  // $('.open-popup').magnificPopup({
  //   type: 'inline'
  // });


  // Gallery

  // $('.card__photo').magnificPopup({
  //   type: 'image',
  //   gallery:{
  //     enabled:true
  //   }
  // });


  // $('.feedback__image').magnificPopup({
  //   type: 'image',
  //   gallery:{
  //     enabled:true
  //   }
  // });

  // $('.trusted__object').magnificPopup({
  //   type: 'image',
  //   gallery:{
  //     enabled:true
  //   }
  // });

  // $('.about__review-image').magnificPopup({
  //   type: 'image',
  //   gallery:{
  //     enabled:true
  //   }
  // });


}, false);



