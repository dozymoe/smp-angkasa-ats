@extends ('base_drawer')
@php
  $user = Auth::user();
@endphp


@section ('drawer_menu_website')
  @if ($user)
    <a href="{{route('logout')}}" class="mdc-list-item">
      <span class="mdc-list-item__ripple"></span>
      <span class="mdc-list-item__graphic fa fa-sign-out-alt"></span>
      <span class="mdc-list-item__text">Sign Out</span>
    </a>
  @else
    <a href="{{route('signin')}}" class="mdc-list-item">
      <span class="mdc-list-item__ripple"></span>
      <span class="mdc-list-item__graphic fa fa-sign-in-alt"></span>
      <span class="mdc-list-item__text">Sign In</span>
    </a>
  @endif
@endsection


@section ('footer')
@endsection
