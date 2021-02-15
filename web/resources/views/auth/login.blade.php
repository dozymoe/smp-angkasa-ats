@extends (
    'base',
    [
      'title' => "Login",
    ])


@section ('content')
<div class="mdc-layout-grid__cell">
  <form action="" method="post">
    @csrf

    <div class="form-group">
      <label class="mdc-text-field mdc-text-field--outlined">
        <span class="mdc-notched-outline">
          <span class="mdc-notched-outline__leading"></span>
          <span class="mdc-notched-outline__notch">
            <span class="mdc-floating-label" id="email-label">Email</span>
          </span>
          <span class="mdc-notched-outline__trailing"></span>
        </span>
        <input name="email" value="{{old('email')}}" type="email" required
            aria-labelledby="email-label" class="mdc-text-field__input">
      </label>
    </div>

    <div class="form-group">
      <label class="mdc-text-field mdc-text-field--outlined">
        <span class="mdc-notched-outline">
          <span class="mdc-notched-outline__leading"></span>
          <span class="mdc-notched-outline__notch">
            <span class="mdc-floating-label" id="password-label">Password</span>
          </span>
          <span class="mdc-notched-outline__trailing"></span>
        </span>
        <input name="password" value="" type="password" required
            aria-labelledby="password-label" class="mdc-text-field__input">
      </label>
    </div>

    <div class="mdc-touch-target-wrapper">
      <button type="submit" class="mdc-button mdc-button--raised mdc-button--touch">
        <span class="mdc-button__ripple"></span>
        <span class="fa fa-sign-in-alt mdc-button__icon" aria-hidden="true"></span>
        <span class="mdc-button__label">Login</span>
        <span class="mdc-button__touch"></span>
      </button>
    </div>
  </form>
</div>
@endsection
