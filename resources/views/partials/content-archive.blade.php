<article class="content__article article">
  <h2 class="article__title title">
    <a href="{{ the_permalink() }}">{{ the_title() }}</a>
  </h2>
  <div class="article__text text">{!! get_the_excerpt() !!}</div>
</article>
