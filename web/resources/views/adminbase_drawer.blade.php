@extends ('adminbase')

@section ('body')
<body class="mdc-typography has-drawer {{$body_classes ?? ''}}">
  <header class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
      <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        @if (View::hasSection('topbar_left'))
          @yield ('topbar_left')
        @else
          <a href="{{route('Home')}}" aria-label="Home Page"
              title="Home Page" class="mdc-icon-button material-icons">
            home
          </a>
        @endif

        <h1 class="mdc-top-app-bar__title">{{$title_content}}</h1>
      </section>

      @if (View::hasSection('topbar_right_wrapper'))
        @yield ('topbar_right_wrapper')
      @else
        <section role="toolbar" id="topbar-right-menu"
            class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
          @yield ('topbar_right')
          <button type="button" aria-label="Open navigation menu"
              title="Open navigation menu"
              class="mdc-top-app-bar__navigation-icon mdc-icon-button material-icons">
            menu
          </button>
        </section>
      @endif
    </div>
  </header>

  <aside class="mdc-drawer mdc-drawer--modal">
    <div class="mdc-drawer__content">
      <div class="mdc-list">
        @yield ('drawer')

        <div class="mdc-list-group">
          <h6 class"mdc-list-group__subheader">Website</h6>
          @yield ('drawer_menu_website')
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
        </div>
      </div>
    </div>
  </aside>
  <div class="mdc-drawer-scrim"></div>

  <main id="main" class="mdc-top-app-bar--fixed-adjust">
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        @if (View::hasSection('content'))
          @yield ('content')
        @else
          <div class="mdc-layout-grid__cell--span-12">
            <p>Under construction.</p>
          </div>
        @endif
      </div>
    </div>
    @if (View::hasSection('jscontent'))
      @yield ('jscontent')
    @else
      <div id="js_app"></div>
    @endif
    <div id="js_modal"></div>
  </main>
  @yield ('extra_body')
</body>
@endsection
