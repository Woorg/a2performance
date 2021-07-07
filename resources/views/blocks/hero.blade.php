<section class="hero">
  <div class="hero__container container" >
    <div class="hero__content">
      <h1 class="hero__title">{!! $hero_title !!}</h1>
      <div class="hero__text">{!! wpautop($hero_text) !!}</div>

      @php
        $instagram_url =  carbon_get_theme_option('instagram_url');
        $twitter_url   =  carbon_get_theme_option('twitter_url');
        $facebook_url  =  carbon_get_theme_option('facebook_url');
      @endphp

      <ul class="hero__social social">
        <li class="social__item">
          <a class="social__link" href="{{ esc_url($instagram_url) }}">
            <svg class="social__icon" width="40px" height="40px">
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#instagram-icon"></use>
            </svg>
          </a>
        </li>
        <li class="social__item">
          <a class="social__link" href="{{ esc_url($twitter_url) }}">
            <svg class="social__icon" width="40px" height="41px">
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#twitter-icon"></use>
            </svg>
          </a>
        </li>
        <li class="social__item">
          <a class="social__link" href="{{ esc_url($facebook_url) }}">
            <svg class="social__icon" width="40px" height="41px">
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#fb-icon">
              </use>
            </svg>
          </a>
        </li>
      </ul>



    </div>
  </div>
</section>
