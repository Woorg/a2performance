<header class="header">
  <div class="header__container container">

    <a class="header__logo logo" href="{{ site_url('/') }}">
      {!! wp_get_attachment_image( $general_info['logo'], 'full' ) !!}
    </a>

    <nav class="header__nav nav nav_primary">
      <button class="nav__trigger">
        <svg class="nav__trigger-icon" width="32px" height="15px">
          <use xlink:href="{{ svg_path() }}svg-symbols.svg#menu-icon"></use>
        </svg>
        <span class="nav__trigger-close"></span>
      </button>

      {!! App::primaryMenu() !!}

    </nav>

    <a href="#feedback" class="header__contact button">Contact</a>

  </div>
</header>
