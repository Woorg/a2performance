@extends('layouts.app-inner')
@section('content')

  <div class="page__back back">
    <a href="{!! site_url('/') !!}" class="back__link">
      <svg class="back__icon" width="36px" height="35px">
        <use xlink:href="{{ svg_path() }}svg-symbols.svg#back-icon"></use>
      </svg>
      Back
    </a>
  </div>

  <div class="notfound">
      <div class="notfound__container container">

          <h1 class="notfound__title title title_big">404. Page not found</h1>
      </div>
  </div>
@endsection
