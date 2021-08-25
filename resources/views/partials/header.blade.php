@php
  $inst  = carbon_get_theme_option('instagram_url');
  $phone = carbon_get_theme_option('phone');
@endphp

<header class="header">
  <div class="header__container container flex">
    <a class="header__logo logo" href="{{ home_url('/') }}">
      <svg class="logo__icon" width="220px" height="32px">
        <use xlink:href="{{ svg_path() }}/svg-symbols.svg#logo"></use>
      </svg>
    </a>


    @if ( has_nav_menu('primary_navigation') )
    <nav class="nav nav_primary header__nav">
      <button class="nav__trigger">
        <svg class="nav__icon_open" width="512px" height="360px">
          <use xlink:href="{{ svg_path() }}/svg-symbols.svg#menu-icon"></use>
        </svg>

        <svg class="nav__icon_close" width="513px" height="512px">
          <use xlink:href="{{ svg_path() }}/svg-symbols.svg#menu-close"></use>
        </svg>
      </button>

       {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_id' => '',
          'container' => '',
          'menu_class' => 'nav__list flex',
          'before' => '',
          'after' => '',
          'link_before' => '<span>',
          'link_after' => '</span>'])
        !!}

    </nav>
    @endif

    <div class="header__contacts flex">
      <ul class="social flex header__social">
        <li class="social__item">
          <a class="social__link" href="{{ $inst }}" target="_blank">
            <svg class="social__icon" width="24" height="24">
              <use xlink:href="{{ svg_path() }}/svg-symbols.svg#inst-icon"></use>
            </svg>
          </a>
        </li>

      </ul>


      <div class="phone flex header__phone">
        <a class="phone__link" href="{{  'tel:+' . str_replace( [
										")",
										"(",
										" ",
										"-",
                    ], "", $phone ) }}">{{ $phone }}</a>
      </div>

    </div>
  </div>
</header>
