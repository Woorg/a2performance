<section class="instagram">
  <div class="instagram__container container">
    <div class="instagram__top">
      <h2 class="instagram__title title">{{ $title }}</h2>

      <svg class="instagram__icon" width="24px" height="24px">
        <use xlink:href="{{ svg_path() }}/svg-symbols.svg#inst-icon"></use>
      </svg>
    </div>

    <div class="instagram__text text">{{ $text }}</div>

    <div id="instafeed" class="instagram__list"></div>

  </div>
</section>

