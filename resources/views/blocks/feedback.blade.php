<section id="feedback" class="feedback">

  <picture class="feedback__bg">
    <source type="image/png" srcset="{{ images_path() }}/general/feedback-bg-mob.png 1x, {{ images_path() }}/general/feedback-bg-mob@2x.png 2x" media="(max-width: 800px) " />
    <source type="image/webp" srcset="{{ images_path() }}/general/feedback-bg-mob.webp 1x, {{ images_path() }}/general/feedback-bg-mob@2x.webp 2x" media="(max-width: 800px)" />


    <source type="image/png" srcset="{{ images_path() }}/general/feedback-bg.png 1x, {{ images_path() }}/general/feedback-bg@2x.png 2x" />

    <source type="image/webp" srcset="{{ images_path() }}/general/feedback-bg.webp 1x, {{ images_path() }}/general/feedback-bg@2x.webp 2x" />

    <img src="{{ images_path() }}/general/feedback-bg.png" srcset="{{ images_path() }}/general/feedback-bg.png 1x, {{ images_path() }}/general/feedback-bg@2x.png 2x" alt="" />
  </picture>


  <div class="feedback__container container">
    <h2 class="feedback__title title">{{ $title }}</h2>

    <div class="feedback__form form">
      {!! do_shortcode($form_shortcode) !!}
    </div>

  </div>
</section>



