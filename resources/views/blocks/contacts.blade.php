@php
  $text = wpautop( $text );
@endphp

<div class="contacts">
  <div class="contacts__container container">

    <h1 class="contacts__title title">{{ $title }}</h1>

    <div class="contacts__text text">{!! $text !!}</div>

    <div class="contacts__form">{!! do_shortcode($form_shortcode) !!}</div>

  </div>
</div>



