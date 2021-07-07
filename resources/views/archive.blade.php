@extends('layouts.app-inner')

@section('content')


<section class="page__content content">

  <h1 class="content__title title">{{ post_type_archive_title() }}</h1>

  <div class="content__list">

    @while ( have_posts() ) @php the_post(); @endphp

      @include('partials.content-archive' )

    @endwhile

  </div>

  <div class="content__pagination">
    {{ the_posts_pagination() }}
  </div>

</section>

<aside class="page__sidebar sidebar">
  <div class="sidebar__block">
    <h2 class="sidebar__title">Other news</h2>

    @php
      $query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => [ get_the_ID() ],
        'orderby'        => 'id',
        'order'          => 'DESC',
      ]);

    @endphp

    @if ( $query->have_posts() )

    <ul class="sidebar__list">

      @while ( $query->have_posts() ) @php $query->the_post(); @endphp

      <li class="sidebar__list-item">
        <svg class="sidebar__list-icon" width="20px" height="24px">
          <use xlink:href="{{ svg_path() }}svg-symbols.svg#article-icon"></use>
        </svg>
        <a href="{{ the_permalink() }}" class="sidebar__link">{{ the_title() }}</a>
      </li>

      @endwhile @php wp_reset_postdata(); @endphp

    </ul>

    @endif

  </div>


@php
    $instagram_url   = carbon_get_theme_option( 'instagram_url' );
    $twitter_url     = carbon_get_theme_option( 'twitter_url' );
    $facebook_url    = carbon_get_theme_option( 'facebook_url' );
@endphp


  <div class="sidebar__block">
    <h2 class="sidebar__title">Share news</h2>

    <ul class="sidebar__social social social_second">
      <li class="social__item">
        <a class="social__link" href="{{ esc_url($instagram_url) }}">
        <svg class="social__icon" >
          <use xlink:href="{{ svg_path() }}svg-symbols.svg#instagram-second-icon"></use>
        </svg>
        </a>
      </li>
      <li class="social__item">
        <a class="social__link" href="{{ esc_url($twitter_url) }}">
          <svg class="social__icon" >
            <use xlink:href="{{ svg_path() }}svg-symbols.svg#twitter-icon"></use>
          </svg>
        </a>
      </li>
      <li class="social__item">
        <a class="social__link" href="{{ esc_url($facebook_url) }}">
          <svg class="social__icon" >
            <use xlink:href="{{ svg_path() }}svg-symbols.svg#fb-icon">
            </use>
          </svg>
        </a>
      </li>
    </ul>

  </div>
</aside>

@endsection
