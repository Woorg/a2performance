<section class="advantages">
  <div class="advantages__container container">
    <h2 class="advantages__title title">{{ $advantages_title }}</h2>

    @if ($advantages)
    <ul class="advantages__list">

      @foreach ($advantages as $advantage)

        {{-- @dump($advantage) --}}

        @php
          $advantage_image_id = $advantage['advantages_image'];
          $advantage_title = $advantage['advantages_item_title'];
          $advantage_text = $advantage['advantages_text'];
        @endphp

        <li class="advantages__item">

          {!! wp_get_attachment_image($advantage_image_id, 'full', null, ['class' => 'advantages__image']) !!}

          <div class="advantages__entry">
            <div class="advantages__item-title">{{ $advantage_title }}</div>
            <div class="advantages__text">{!! $advantage_text !!}</div>
          </div>

        </li>
      @endforeach

    </ul>
    @endif

    <a href="{{ $advantages_more }}" class="advantages__more button button_more">Подробнее

      <svg class="button__icon" width="25px" height="24px">
        <use xlink:href="{{ svg_path() }}/svg-symbols.svg#button-arrow"></use>
      </svg>

    </a>

  </div>
</section>
