@extends (
    'base_drawer',
    [
      'title' => "Visi dan Misi",
    ])


@section ('topbar_left')
<a href="{{route('Home')}}" aria-label="Home Page"
    title="Home Page" class="mdc-icon-button material-icons">
  arrow_back
</a>
@endsection


@section ('drawer')
<span class="mdc-list-item">
  <span class="mdc-list-item__text">Profil</span>
</span>
<a href="#kegiatan" tabindex="3" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Kegiatan</span>
</a>
<a href="{{route('Ppdb')}}" tabindex="4" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">PPDB</span>
</a>
<div role="separator" class="mdc-list-divider"></div>
<div class="mdc-list-group">
  <h6 class="mdc-list-group__subheader">Profil</h6>
  <a href="{{route('VisiMisi')}}" tabindex="0" class="mdc-list-item">
    <span class="mdc-list-item__ripple"></span>
    <span class="mdc-list-item__text">Visi &amp; Misi</span>
  </a>
</div>
@endsection


@section ('drawer_menu_website')
<a href="/contact-us" tabindex="1" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Hubungi Kami</span>
</a>
@endsection


@section ('content')
<div class="mdc-layout-grid__cell--span-12">
  <h2>Visi Sekolah</h2>
  <p>
    Terwujudnya sekolah Angkasa yang unggul dan rujukan dalam menghasilkan abdi
    yang beragama, berbangsa, dan bernegara, serta berilmu demi kejayaan
    Nusantara.
  </p>
  <h2>Misi Sekolah</h2>
  <p>
    Menyelenggarakan pendidikan dan pembelajaran agama guna menghasilkan lulusan
    yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa dan berakhlak mulia.
  </p>
  <p>
    Menyelenggarakan pendidikan dan pembelajaran kebangsaan guna menghasilkan
    lulusan yang cinta  tanah air, cinta alam sekitar, cinta sesama, dan cinta
    diri sendiri.
  </p>
  <p>
    Menyelenggarakan pendidikan dan pembelajaran kebangsaan guna menghasilkan
    lulusan yang cerdas intelektual, kinestik, dan estetis, cinta ilmu
    pengetahuan, teknologi, dan keunggulan sesuai minat dan bakat peserta didik.
  </p>
</div>
@endsection
