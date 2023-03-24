@php
  $configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
  data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item me-auto">
        <a class="navbar-brand" href="{{ url('/') }}">
          <span class="brand-logo">
            <svg width="30" height="30" viewBox="0 0 34 43" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M0.600098 5.00008V37.9001C0.600098 41.4001 4.50015 43.4001 7.40015 41.5001L31.5001 25.2001C34.0001 23.5001 34.0001 19.8001 31.5001 18.0001L7.40015 1.40008C4.50015 -0.599927 0.600098 1.50008 0.600098 5.00008Z"
                fill="#ffffff" />
            </svg>
          </span>
          <h2 class="brand-text mb-0">{{ env('APP_NAME') }}</h2>
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      {{-- Foreach menu item starts --}}
      @if (isset($menuData[0]))
        @foreach ($menuData[0]->menu as $menu)
          {{-- {{ dd($menu) }} --}}
          @if (isset($menu->navheader))
            <li class="navigation-header">
              <span>{{ __($menu->navheader) }}</span>
              <i data-feather="more-horizontal"></i>
            </li>
          @else
            {{-- Add Custom Class with nav-item --}}
            @php
              $custom_classes = '';
              if (isset($menu->classlist)) {
                  $custom_classes = $menu->classlist;
              }
            @endphp
            @can($menu->can)
              <li class="nav-item {{ $custom_classes }} {{ in_array(Route::currentRouteName(), $menu->slug) ? 'active' : '' }}">
                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}" class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                  <i data-feather="{{ $menu->icon }}"></i>
                  <span class="menu-title text-truncate">{{ __($menu->name) }}</span>
                  @if (isset($menu->badge))
                    <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                    <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                  @endif
                </a>
                @if (isset($menu->submenu))
                  @include('dashboard.panels.submenu', ['menu' => $menu->submenu])
                @endif
              </li>
            @endcan
          @endif
        @endforeach
      @endif
      {{-- Foreach menu item ends --}}
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
