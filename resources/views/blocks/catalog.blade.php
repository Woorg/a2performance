
<div class="catalog">

  <div class="catalog__in container">
    @if ($title)
      <h2 class="catalog__title title title">{{ $title }}</h2>
    @endif

    @php

      $args = [
        'no_found_rows'  => true,
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false,
        'post_type'      => 'catalog',
        'posts_per_page' => 12,
        'order' => 'ASC',
        'orderby' => 'date'
      ];

      $q = new WP_Query( $args );

    @endphp

    @if ( $q->have_posts() )

        <nav class="catalog__nav">
          <ul class="catalog__nav-list">
      @while ( $q->have_posts() ) @php $q->the_post() @endphp

        @php
          $brands = get_the_terms(get_the_ID(), 'brand');
        @endphp

            @foreach( $brands as $brand )
              @php
                $brand_link = get_term_link( (int) $brand->term_id);
              @endphp

              {{-- @dump($brands) --}}

              <li class="catalog__nav-item">
                <a href="{{ $brand_link }}" class="catalog__nav-link">
                  <img class="catalog__nav-icon" width="64px" height="64px" src="{{ images_path() }}general/{{ $brand->slug }}-icon.svg" alt="">
                </a>
              </li>

            @endforeach
      @endwhile

          </ul>
        </nav>



      @php wp_reset_postdata() @endphp

    @endif



    @if ( $q->have_posts() )

    <div class="catalog__list flex">

      @while ( $q->have_posts() ) @php $q->the_post() @endphp

        @php
          $brands   = get_the_terms(get_the_ID(), 'brand');
          $car_list = carbon_get_the_post_meta('car_list');
        @endphp

        {{-- @dump(carbon_get_the_post_meta('car_list')) --}}

        <article class="catalog__card card">
          <div class="card__in">
            <div class="card__image">
              <a class="card__link" href="{{ the_permalink() }}"></a>
              {{ the_post_thumbnail() }}
              <a class="card__feedback" href="">Отзыв клиента</a>
            </div>
            <div class="card__body">
              <div class="card__model flex">
                @foreach( $brands as $brand )
                <img class="card__logo" width="24px" height="24px" src="{{ images_path() }}general/{{ $brand->slug }}-icon.svg" alt="">
                @endforeach
                <div class="card__model-name">{{ the_title() }}</div>
              </div>



              <dl class="card__list">


                @foreach ($car_list as $car_list_item)

                  {{-- @dump($car_list_item) --}}

                <div class="card__list-item">

                  <dt class="card__term">{{ $car_list_item['car_data_title'] }} <span>{{ $car_list_item['car_data_value'] }}</span></dt>

                  @foreach ($car_list_item['car_values'] as $car_value)
                    {{-- @dump($car_value) --}}
                    @php
                      $before = $car_value['car_data_before'];
                      $after  = $car_value['car_data_after'];
                    @endphp
                  <dd class="card__desc flex">

                    <div class="card__from">{{ $before }}</div>
                    <div class="card__arrow">→</div>
                    <div class="card__to">{{ $after }}</div>

                  </dd>
                  @endforeach

                </div>
                @endforeach

              </dl>


              <a class="card__price flex" href="{{ the_permalink() }}">Цены и графики
                <svg class="card__price-icon" width="8px" height="12px"><use xlink:href="{{ svg_path() }}/svg-symbols.svg#price-arrow"></use></svg>
              </a>

            </div>
          </div>
        </article>

      @endwhile

        @php wp_reset_postdata() @endphp

    </div>

    @endif

  </div>
</div>

