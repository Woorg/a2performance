
@if ($hero_slider)
<section class="hero">
  <div class="hero__slider swiper-container">
    <div class="swiper-wrapper">

    @foreach ($hero_slider as $item)

      @php
        $photo = $item['photo'];
        $title = $item['title'];
        $text = $item['text'];
        $button_text = $item['button_text'];
      @endphp

      <div class="hero__slide swiper-slide">

        {!! wp_get_attachment_image($photo, 'full', null, ['class' => 'hero__image']) !!}

        <div class="hero__container container">

          <div class="hero__content">

            @if ($title)
            <h1 class="hero__title title">{{ $title }}</h1>
            @endif

            @if ($text)
            <div class="hero__text">{!! $text !!}</div>
            @endif

            @if ($button_text)
            <a class="hero__button open-popup button" href="#sign-up-w-discount">{!! $button_text !!}</a>
            @endif

          </div>
        </div>
      </div>
    @endforeach

    </div>
    <div class="hero__pagination swiper-pagination flex"></div>

  </div>
</section>
@endif


