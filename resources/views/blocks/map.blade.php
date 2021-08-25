@php
  $text = wpautop( $text );
@endphp

<div class="map">
  <div class="map__container container">

    <h1 class="map__title title">{{ $title }}</h1>
    <div class="map__text text">{!! $text !!}</div>
    <div class="map__object">{!! $map !!}</div>

  </div>
</div>



