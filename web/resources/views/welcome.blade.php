@extends (
    'base_drawer',
    [
    ])


@section ('drawer')
<a href="{{route('VisiMisi')}}" tabindex="0" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Profil</span>
</a>
<a href="#kegiatan" tabindex="1" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Kegiatan</span>
</a>
<a href="{{route('Ppdb')}}" tabindex="2" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">PPDB</span>
</a>
@endsection


@section ('drawer_menu_website')
<a href="/contact-us" tabindex="0" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Hubungi Kami</span>
</a>
@endsection
