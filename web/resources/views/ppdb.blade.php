@extends (
    'base_drawer',
    [
      'title' => "Penerimaan Peserta Didik Baru",
    ])


@section ('topbar_left')
<a href="{{route('Home')}}" aria-label="Home Page"
    title="Home Page" class="mdc-icon-button material-icons">
  arrow_back
</a>
@endsection


@section ('drawer')
<a href="{{route('VisiMisi')}}" tabindex="2" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Profil</span>
</a>
<a href="#kegiatan" tabindex="3" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Kegiatan</span>
</a>
<a href="{{route('Ppdb')}}" tabindex="0" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">PPDB</span>
</a>
@endsection


@section ('drawer_menu_website')
<a href="/contact-us" tabindex="1" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Hubungi Kami</span>
</a>
@endsection


@section ('content')
<div class="mdc-layout-grid__cell--span-12">
  <p>
    <a href="https://sekolah-angkasa.sch.id/download/2018/" target="_blank">
      Unduh dokumen PPDB
    </a>
  </p>
</div>
@endsection
