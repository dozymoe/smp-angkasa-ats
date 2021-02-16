@extends ('base')
@php
  $user = Auth::user();
@endphp


@section ('topbar_right_wrapper')
<section role="toolbar" id="topbar-right-menu"
    class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
  @yield ('topbar_right')
  @if ($user)
    <a href="{{route('logout')}}" aria-label="Sign Out"
        title="Sign Out" class="mdc-icon-button">
      <span class="fa fa-sign-out-alt"></span>
    </a>
  @else
    <a href="{{route('login')}}" aria-label="Sign In"
        title="Sign In" class="mdc-icon-button">
      <span class="fa fa-sign-in-alt"></span>
    </a>
  @endif
</section>
@endsection


@section ('footer')
@endsection
