@php
    $instagram_url   = carbon_get_theme_option( 'instagram_url' );
    $twitter_url     = carbon_get_theme_option( 'twitter_url' );
    $facebook_url    = carbon_get_theme_option( 'facebook_url' );
    $copyright       = carbon_get_theme_option( 'copyright' );
    $logo            = carbon_get_theme_option( 'logo_image' );
    $logo_image_text = carbon_get_theme_option( 'logo_image_text' );
    $basedin         = carbon_get_theme_option( 'basedin' );
    $email           = carbon_get_theme_option( 'email' );


@endphp


<footer class="footer">
  <div class="footer__container container">

    <a class="footer__logo logo" href="{{ site_url('/') }}">
      {!! wp_get_attachment_image( $logo_image_text, 'full' ) !!}
    </a>

    <div class="footer__contacts">
      <div class="footer__based">
          <svg class="footer__based-icon" >
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#marker-icon"></use>
          </svg>
          {{ $basedin }}
      </div>
      <a class="footer__email" href="mailto:{{ $email }}">
          <svg class="footer__email-icon" >
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#email-icon"></use>
          </svg>
          {{ $email }}
      </a>

    </div>

    <ul class="footer__social social social_second">
        <li class="social__item">
          <a class="social__link" href="{{ esc_url($instagram_url) }}">
          <svg class="social__icon" >
            <use xlink:href="{{ svg_path() }}svg-symbols.svg#instagram-second-icon"></use>
          </svg>
          </a>
        </li>
        <li class="social__item">
          <a class="social__link" href="{{ esc_url($twitter_url) }}">
            <svg class="social__icon" >
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#twitter-icon"></use>
            </svg>
          </a>
        </li>
        <li class="social__item">
          <a class="social__link" href="{{ esc_url($facebook_url) }}">
            <svg class="social__icon" >
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#fb-icon">
              </use>
            </svg>
          </a>
        </li>
      </ul>


  </div>
</footer>

