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
            autofocus tabindex="0"
            aria-labelledby="email-label"
            aria-describedby="email-errors"
            class="mdc-text-field__input">
      </label>
      {{ Html::ul($errors->get('email'), ['id' => 'email-errors',
          'role' => 'alert', 'class' => 'form-errors']) }}
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
            tabindex="1"
            aria-labelledby="password-label"
            aria-describedby="password-errors"
            class="mdc-text-field__input">
      </label>
      {{ Html::ul($errors->get('password'), ['id' => 'password-errors',
          'role' => 'alert', 'class' => 'form-errors']) }}
    </div>

    <div class="mdc-touch-target-wrapper">
      <button type="submit" tabindex="2"
          class="mdc-button mdc-button--raised mdc-button--touch">
        <span class="mdc-button__ripple"></span>
        <span class="fa fa-sign-in-alt mdc-button__icon" aria-hidden="true"></span>
        <span class="mdc-button__label">Login</span>
        <span class="mdc-button__touch"></span>
      </button>
    </div>
  </form>
</div>
@endsection
