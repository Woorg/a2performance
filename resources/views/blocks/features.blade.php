<div class="features">
  <div class="features__container container">
    <h2 class="features__title title">{{ $feature_title }}</h2>

    @if ($features)
      @php
        $i = 0;
      @endphp
      <ul class="features__list">

        @foreach ($features as $feature)
          @php
            $i++;
            $title = $feature['feature_item_title'];
            $text = $feature['feature_item_text'];
          @endphp

        <li class="features__item">
          <h3 class="features__item-title title title_secondary">
            <svg class="features__icon" width="32px" height="32px">
              <use xlink:href="{{ svg_path() }}svg-symbols.svg#feature-{{ $i }}-icon"></use>
            </svg>

            {{ $title }}
          </h3>
          <p class="features__text">{{ $text }}</p>
        </li>
        @endforeach

      </ul>
    @endif


    <div class="features__video">
      {!! wp_get_attachment_image($feature_image, 'full', ['class' => 'features__video-img']) !!}
      <a class="features__video-link" href="{{ esc_url($feature_video) }}">
        <svg class="features__video-icon" width="80px" height="80px">
          <use xlink:href="{{ svg_path() }}svg-symbols.svg#play-icon"></use>
        </svg>
      </a>
    </div>

  </div>
</div>
