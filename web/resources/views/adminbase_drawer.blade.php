@extends ('base_drawer')
@php
  $user = Auth::user();
@endphp


@section ('drawer_menu_website')
  @if ($user)
    <a href="{{route('logout')}}" aria-label="Sign Out"
        title="Sign Out" class="mdc-icon-button">
      <span class="fa fa-sign-out-alt"></span>
    </a>
  @else
    <a href="{{route('signin')}}" aria-label="Sign In"
        title="Sign In" class="mdc-icon-button">
      <span class="fa fa-sign-in-alt"></span>
    </a>
  @endif
@endsection


@section ('footer')
@endsection
