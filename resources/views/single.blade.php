@extends('layouts.app-inner')

@section('content')


@php
  $category_id   = get_cat_ID( 'News' );
  $category_link = get_category_link( $category_id );

@endphp

<div class="page__back back">
  <a href="{!! $category_link !!}" class="back__link">
    <svg class="back__icon" width="36px" height="35px">
      <use xlink:href="{{ svg_path() }}svg-symbols.svg#back-icon"></use>
    </svg>
    Back
  </a>
</div>


<div class="page__content content">

  @while ( have_posts() ) @php the_post(); @endphp

    @include('partials.content-single' )

  @endwhile

</div>

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
