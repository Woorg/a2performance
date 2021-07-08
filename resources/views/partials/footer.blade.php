<footer class="footer">
  <div class="footer__container container">

    <a class="footer__logo logo" href="{{ site_url('/') }}">
      {!! wp_get_attachment_image( $general_info['logo_second'], 'full' ) !!}
    </a>

    <div class="footer__contacts">
      <div class="footer__based">
          <svg class="footer__based-icon" >
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#marker-icon"></use>
          </svg>
          {{ $general_info['basedin'] }}
      </div>
      <a class="footer__email" href="mailto:{{ $email }}">
          <svg class="footer__email-icon" >
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#email-icon"></use>
          </svg>
          {{ $general_info['email'] }}
      </a>

    </div>

    <ul class="footer__social social social_second">
      <li class="social__item">
        <a class="social__link" href="{{ esc_url( $social_links['instagram_url'] ) }}">
        <svg class="social__icon" >
          <use xlink:href="{{ svg_path() }}svg-symbols.svg#instagram-second-icon"></use>
        </svg>
        </a>
      </li>
      <li class="social__item">
        <a class="social__link" href="{{ esc_url( $social_links['twitter_url'] ) }}">
          <svg class="social__icon" >
            <use xlink:href="{{ svg_path() }}svg-symbols.svg#twitter-icon"></use>
          </svg>
        </a>
      </li>
      <li class="social__item">
        <a class="social__link" href="{{ esc_url( $social_links['facebook_url'] ) }}">
          <svg class="social__icon" >
            <use xlink:href="{{ svg_path() }}svg-symbols.svg#fb-icon">
            </use>
          </svg>
        </a>
      </li>
    </ul>


  </div>
</footer>

