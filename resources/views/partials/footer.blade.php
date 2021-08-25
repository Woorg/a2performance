@php
  $inst      = carbon_get_theme_option('instagram_url');
  $phone     = carbon_get_theme_option('phone');
  $copyright = carbon_get_theme_option('copyright');
@endphp

<div class="page__bottom">
  <footer class="footer">
    <div class="footer__container container">
      <div class="footer__top flex">
        <div class="footer__row flex">
          <a class="footer__logo logo" href="{{ home_url('/') }}">
            <svg class="logo__icon" width="220px" height="32px">
              <use xlink:href="{{ svg_path() }}/svg-symbols.svg#logo"></use>
            </svg>
          </a>
        </div>
        <div class="footer__row flex">
          <div class="footer__text">{{ bloginfo('description') }}</div>
          <div class="phone flex phone_w_text footer__phone"><a class="phone__link" href="{{  'tel:+' . str_replace( [
										")",
										"(",
										" ",
										"-",
                    ], "", $phone ) }}">{{ $phone }}</a>
            <p class="phone__text">Звонок по России бесплатный</p>
          </div>
        </div>
      </div>
      <div class="footer__bottom flex">
        <div class="footer__copyright">&copy; {{ date('Y') }} {{ $copyright }}</div>

        <ul class="social flex footer__social">
          <li class="social__item">
            <a class="social__link" href="{{ $inst }}">
              <svg class="social__icon" width="24" height="24">
                <use xlink:href="{{ svg_path() }}/svg-symbols.svg#inst-icon"></use>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  {{-- <div class="popup mfp-hide" id="sign-up-w-discount">
    <h2 class="popup__title">{{ $popup_title }}</h2>

    {!! do_shortcode($popup_shortcode) !!}
  </div> --}}

</div>
