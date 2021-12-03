<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ url('admin') }}"><img src="{{ asset('frontend/images/Feroz-Oxy.png') }}" alt="" width="150" height="45"></a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ url('admin') }}"><img src="{{ asset('frontend/images/Feroz-Oxy.png') }}" alt="" width="60" height="30"></a>
  </div>
  <ul class="sidebar-menu" id="myMenu">
      <li class="menu-header ml-4">Dashboard</li>
      {{-- <li class="menu-header">Dashboard</li> --}}
      {{-- <li class="nav-item"> --}}
        <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{ url('admin') }}" class="nav-link"><i class="fas fa-fw fa-home"></i><span>Dashboard</span></a></li>
      {{-- </li> --}}
      <li class="menu-header ml-4">Kategori</li>
      <li class="nav-item dropdown {{ Request::is('users') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fw fa-user"></i> <span>Mengelola Users</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('users') ? 'active' : '' }}"><a class="nav-link" href="{{ url('users') }}"><span>User</span></a></li>
        </ul>
      </li>
      <li class="{{ Request::is('artikels') ? 'active' : '' }}"><a class="nav-link" href="{{ url('artikels') }}"><i class="fas fa-fw fa-newspaper"></i> <span>Mengelola Artikels</span></a></li>
      <li class="{{ Request::is('pesanan_air') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pesanan_air') }}"><i class="fas fa-prescription-bottle"></i> <span>Mengelola Pesanan Air</span></a></li>
      {{-- <li class="{{ Request::is('petty') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/petty') }} "><i class="fas fa-fw fa-wallet"></i> <span>Petty Cash</span></a></li>

    <li class="{{ Request::is('surat') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/surat') }} "><i class="fas fa-fw fa-envelope"></i> <span>Surat</span></a></li>
      <?php
      if (Session::get('level') == 'admin') {?>
        <li class="{{ Request::is('akun') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/akun') }} "><i class="fas fa-fw fa-user-alt"></i> <span>Akun</span></a></li>
      <?php
      }?>  
      <li class="{{ Request::is('invoice')?'active':'' }}"><a class="nav-link" href="{{ url('/invoice') }} "><i class="fas fa-fw fa-file-invoice"></i> <span>Invoice</span></a></li>
      <li class="menu-header ml-4">Lain-lainnya</li>
      <li class="{{ Request::is('pelanggan') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/pelanggan') }} "><i class="fas fa-fw fa-users"></i> <span>Pelanggan</span></a></li> --}}
      {{-- <li class="{{ Request::is('labarugi') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/labarugi') }} "><i class="fas fa-fw fa-chart-line"></i> <span>Laba/Rugi</span></a></li> --}}
      
  </ul>
</aside>