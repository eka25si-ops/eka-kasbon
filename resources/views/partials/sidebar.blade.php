@php
  $menus = [
    ['header' => 'Utama'],
    ['label' => 'Dashboard', 'icon' => 'fa-fire', 'route' => 'dashboard', 'pattern' => 'admin'],
    ['header' => 'Data'],
    ['label' => 'Barang', 'icon' => 'fa-box', 'route' => 'barang.index', 'pattern' => 'admin/barang*'],
    ['label' => 'Pelanggan', 'icon' => 'fa-users', 'route' => 'pelanggan.index', 'pattern' => 'admin/pelanggan*'],
    ['label' => 'Supplier', 'icon' => 'fa-truck', 'route' => 'supplier.index', 'pattern' => 'admin/supplier*'],
    ['label' => 'User', 'icon' => 'fa-user-cog', 'route' => 'user.index', 'pattern' => 'admin/user*'],
    ['header' => 'Transaksi'],
    ['label' => 'Penjualan', 'icon' => 'fa-shopping-cart', 'route' => null],
    ['label' => 'Utang dan Cicilan', 'icon' => 'fa-hand-holding-usd', 'route' => 'utang.index', 'pattern' => 'admin/utang*'],
    ['label' => 'Cicilan', 'icon' => 'fa-money-bill-wave', 'route' => 'cicilan.index', 'pattern' => 'admin/cicilan*'],
    ['label' => 'Barang Pecah', 'icon' => 'fa-exclamation-triangle', 'route' => null],
    ['header' => 'Laporan'],
    ['label' => 'Laporan', 'icon' => 'fa-chart-line', 'route' => null],
  ];
@endphp

<ul class="sidebar-menu">
  @foreach ($menus as $m)
    @if (isset($m['header']))
      <li class="menu-header">{{ $m['header'] }}</li>
    @else
      <li class="{{ !empty($m['pattern']) && request()->is($m['pattern']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ $m['route'] ? route($m['route']) : '#' }}">
          <i class="fas {{ $m['icon'] }}"></i> <span>{{ $m['label'] }}</span>
        </a>
      </li>
    @endif
  @endforeach
</ul>
