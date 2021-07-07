<div class="stores">
  <picture class="stores__bg">
    <source type="image/webp" srcset="{{ images_path() }}/general/stores-bg.webp 1x, {{ images_path() }}/general/stores-bg@2x.webp 2x" />
    <img src="{{ images_path() }}/general/stores-bg.png" srcset="{{ images_path() }}/general/stores-bg.png 1x, {{ images_path() }}/general/stores-bg@2x.png 2x" alt="" />
  </picture>


  <div class="stores__container container">

    <div class="stores__slider">
      <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">

          @foreach ($stores as $game)
            <div class="swiper-slide">
              @php
                $game_img      = $game['stores_image'];
                $game_icon     = $game['stores_icon'];
                $game_title    = $game['stores_item_title'];
                $game_text     = $game['stores_item_text'];
                $game_appstore = $game['stores_item_appstore'];
                $game_gplay    = $game['stores_item_gplay'];


              @endphp
              <div class="stores__game">

                <picture class="stores__game-bg">
                  <source srcset={{ images_path() }}/general/cta-bg-mob.png 1x, {{ images_path() }}/general/cta-bg-mob@2x.png 2x" media="(max-width: 800px) " />
                  <source srcset="{{ images_path() }}/general/cta-bg-mob.webp 1x, {{ images_path() }}/general/cta-bg-mob@2x.webp 2x" media="(max-width: 800px)" />


                  <source type="image/webp" srcset="{{ images_path() }}/general/cta-bg.webp 1x, {{ images_path() }}/general/cta-bg@2x.webp 2x" />
                  <img src="{{ images_path() }}/general/cta-bg.png" srcset="{{ images_path() }}/general/cta-bg.png 1x, {{ images_path() }}/general/cta-bg@2x.png 2x" alt="" />
                </picture>


                <div class="stores__image">{!! wp_get_attachment_image($game_img, 'full') !!}</div>
                <div class="stores__entry">
                  <h2 class="stores__game-title title title_secondary">
                    {!! wp_get_attachment_image($game_icon, 'full', null, ['class' => 'stores__game-icon']) !!}
                    {{ $game_title }}
                  </h2>
                  <div class="stores__game-text">{{ $game_text }}</div>
                  <div class="stores__buttons">
                    <a href="{{ esc_url( $game_appstore ) }}" class="stores__store stores__store_appstore">
                      <svg class="stores__icon">
                        <use xlink:href="{{ svg_path() }}svg-symbols.svg#appstore-icon"></use>
                      </svg>
                    </a>
                    <a href="{{ esc_url( $game_gplay ) }}" class="stores__store stores__store_gplay">
                      <svg class="stores__icon">
                        <use xlink:href="{{ svg_path() }}svg-symbols.svg#googleplay-icon"></use>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>

        <!-- If we need pagination -->
        <div class="stores__dots swiper-pagination"></div>

        <div class="stores__nav">
          <div class="stores__arrows">
            <div class="stores__arrow stores__arrow_prev swiper-button-prev">
              <svg class="stores__arrow-icon" width="70px" height="40px">
                <use xlink:href="{{ svg_path() }}svg-symbols.svg#arrow-icon"></use>
              </svg>
            </div>

            <div class="stores__arrow stores__arrow_next swiper-button-next">
              <svg class="stores__arrow-icon" width="70px" height="40px">
                <use xlink:href="{{ svg_path() }}svg-symbols.svg#arrow-icon"></use>
              </svg>
            </div>

          </div>

          <div class="stores__counter">00/00</div>

        </div>



      </div>

    </div>

  </div>
</div>
