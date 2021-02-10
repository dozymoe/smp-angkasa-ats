@extends ('base_drawer')


@section ('drawer')
<div class="mdc-list-group">
  <h6 class="mdc-list-group__subheader">Sekolah</h6>
  <a href="#profile" tabindex="0" class="mdc-list-item">
    <span class="mdc-list-item__ripple"></span>
    <span class="mdc-list-item__text">Profile</span>
  </a>
  <a href="#kegiatan" tabindex="0" class="mdc-list-item">
    <span class="mdc-list-item__ripple"></span>
    <span class="mdc-list-item__text">Kegiatan</span>
  </a>
  <a href="#ppdb" tabindex="0" class="mdc-list-item">
    <span class="mdc-list-item__ripple"></span>
    <span class="mdc-list-item__text">PPDB</span>
  </a>
</div>
@endsection

@section ('drawer_menu_website')
<a href="/contact-us" tabindex="0" class="mdc-list-item">
  <span class="mdc-list-item__ripple"></span>
  <span class="mdc-list-item__text">Contact Us</span>
</a>
@endsection
