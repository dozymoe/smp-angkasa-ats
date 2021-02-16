@extends (
    'base_drawer_admin',
    [
      'title' => "Manajemen",
    ])


@section ('drawer')
<a href="{{route('BlogPosting.Index')}}" tabindex="0" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Administrasi Artikel</span>
</a>
@endsection


@section ('content')
<div class="mdc-layout-grid__cell--span-12">
  <p>
    <a href="{{route('BlogPosting.Index')}}">
      Administrasi Artikel
    </a>
  </p>
</div>
@endsection
