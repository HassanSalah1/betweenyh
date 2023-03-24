@if ($configData['mainLayoutType'] === 'horizontal' && isset($configData['mainLayoutType']))
  <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}" data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" href="{{ url('/') }}">
            <span class="brand-logo">
              <svg width="30" height="30" viewBox="0 0 1495 1474" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1004_186)">
                  <path
                    d="M716.2 535.4C733.2 530.7 749.8 522 766 515.4C803.6 500.1 841 484.3 878.6 469.3C891.9 464 904.8 458.4 918.1 453.1C921.7 451.7 930.6 449.8 932.3 446.1C933.9 442.5 932.8 436.3 932.8 432.4V401V289C932.8 270.4 928.1 247 941.1 232C958.1 212.2 979.1 212.9 1003.1 212.9H1065.3C1157.1 212.9 1249.3 211.5 1341.1 211.5H1385.8C1393.5 211.5 1401.7 212.4 1409.2 211.2C1428.4 207.8 1445.9 196.1 1457.8 180.9C1473.7 160.3 1473.7 137.6 1473.7 112.8C1473.7 96.7002 1475.6 79.5002 1472.5 63.8002C1466.9 36.0002 1445.3 13.7002 1418.9 4.60015C1400.2 -1.79985 1378.5 0.900152 1358.9 0.900152C1324.9 0.900152 1290.7 0.100152 1256.4 0.100152H905.7H823.7C792 0.100152 761.9 -0.0998459 737.5 23.7002C715.1 45.3002 714 72.0002 714 101C714 123 714.6 145 714.8 166.9C715.3 289.5 716.2 412.5 716.2 535.4Z"
                    fill="#ffffff" />
                  <path
                    d="M462.3 716.1V716.9C474 712.8 485.3 706.7 496.7 701.9C523.2 690.3 549.8 678.8 576.5 667.5C657.4 633 738.8 599.6 821.5 570.2C852.4 559.3 883.5 548.5 915.2 539.9C937.5 533.8 959.4 528.8 982.5 529.7V531.1C956.6 533.3 928.8 545.3 904.3 553.6C854.2 570.2 804.8 588.9 756.6 610.3C627.9 667.1 504.7 735.7 389.3 816.3C352.3 842.2 315.9 869.1 280.3 897.2C262 911.6 244.7 927.2 226.1 940.9V941.7C254.8 929.7 282.2 913 310.3 899.5C380.4 865.6 451 832.5 522.4 801.6C636.9 751.9 753.1 705.7 871.3 666.2C933.9 645.3 997.5 627.3 1060.7 608.3C1126.8 588.5 1193.1 569.9 1259.7 551.5C1281.6 545.4 1303.6 539.9 1325.6 534.3C1339.7 530.9 1355 526.2 1369.5 526.2C1365.3 501.8 1339.7 480.9 1320.5 468.3C1264.4 431.1 1187.8 428.5 1122.9 434.7C939.7 452.3 768.5 525.7 611.6 619C560.2 648.7 511.6 682.8 462.3 716.1Z"
                    fill="#ffffff" />
                  <path
                    d="M0 1206.9C10.6 1202.5 20.3 1194.2 30 1188.2C51.2 1174.9 72.5 1161.2 93.7 1147.6C159.9 1105.6 226.3 1063.6 294.2 1024.2C425.6 948 561 876.9 700.3 816.6C810.9 768.7 924.1 726 1041.2 696.7C1107.3 680.1 1176.9 669.8 1245.3 672.8C1267.3 673.7 1288.6 677.8 1310.4 680C1363.2 685.3 1417.2 711.2 1428.2 767.9C1441.2 760.7 1453.3 749.2 1462.9 737.9C1471.6 727.7 1479.5 717.1 1485.1 704.9C1488.8 696.8 1491.7 688.2 1493.1 679.3C1500.8 631.7 1465.8 593.4 1430.5 566.7C1418.5 557.5 1405.7 550 1392.4 542.5C1387.7 539.8 1380.4 534.5 1374.9 534.4C1364.9 534.1 1352.4 539.9 1342.7 542.4C1317.7 548.6 1292.9 555.2 1268 562.1C1190.4 583.7 1112.9 605 1036.1 628.9C866.7 681.5 702.7 752.7 543.1 829.9C430.5 884.4 314.9 940.3 214.7 1015.6C164.4 1053.2 115.1 1092.3 69.1 1135.1C45.1 1157.1 18.3 1180.1 0 1206.9Z"
                    fill="#ffffff" />
                  <path
                    d="M932.7 970V1029.2C932.7 1181.2 840.9 1318.1 700.2 1375.8L462 1473.3L559.5 1403.5C657.9 1333.1 716.1 1219.7 716.1 1098.8V969.8C716.1 969.8 716.1 885.8 716.1 843.8C733.9 839 751.4 831.1 768.7 824.9C803.5 812.1 838.4 799.4 873.3 786.8C892.2 779.9 912.8 769 932.5 765.7C932.7 833.7 932.7 970 932.7 970Z"
                    fill="#ffffff" />
                  <path
                    d="M1201.1 510.5C1201.1 510.5 1253.3 511.4 1254 497.5C1254.7 483.6 1208.4 476.7 1192.5 491.4C1176.1 506.4 1131.6 515.8 1124.1 520C1123.3 520.5 1123.8 521.7 1124.7 521.4L1201.1 510.5Z"
                    fill="white" />
                </g>
                <defs>
                  <clipPath id="clip0_1004_186">
                    <rect width="1494.1" height="1473.3" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </span>
            <h2 class="brand-text mb-0">{{ env('APP_NAME') }}</h2>
          </a>
        </li>
      </ul>
    </div>
  @else
    <nav
      class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} {{ $configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType'] === 'navbar-floating' ? 'container-xxl' : '' }}">
@endif
<div class="navbar-container d-flex content">
  <div class="bookmark-wrapper d-flex align-items-center">
    <ul class="nav navbar-nav d-xl-none">
      <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
    </ul>
    {{-- <ul class="nav navbar-nav bookmark-icons">
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/email') }}" data-bs-toggle="tooltip"
          data-bs-placement="bottom" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/chat') }}" data-bs-toggle="tooltip"
          data-bs-placement="bottom" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/calendar') }}" data-bs-toggle="tooltip"
          data-bs-placement="bottom" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('app/todo') }}" data-bs-toggle="tooltip"
          data-bs-placement="bottom" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link bookmark-star">
          <i class="ficon text-warning" data-feather="star"></i>
        </a>
        <div class="bookmark-input search-input">
          <div class="bookmark-input-icon">
            <i data-feather="search"></i>
          </div>
          <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
          <ul class="search-list search-list-bookmark"></ul>
        </div>
      </li>
    </ul> --}}
  </div>
  <ul class="nav navbar-nav align-items-center ms-auto">
{{--    <li class="nav-item dropdown dropdown-language">--}}
{{--      --}}{{-- <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true">--}}
{{--        <i class="flag-icon flag-icon-us"></i>--}}
{{--        <span class="selected-language">English</span>--}}
{{--      </a>--}}
{{--      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">--}}
{{--        <a class="dropdown-item" href="{{ url('lang/en') }}" data-language="en">--}}
{{--          <i class="flag-icon flag-icon-us"></i> English--}}
{{--        </a>--}}
{{--        <a class="dropdown-item" href="{{ url('lang/fr') }}" data-language="fr">--}}
{{--          <i class="flag-icon flag-icon-fr"></i> French--}}
{{--        </a>--}}
{{--        <a class="dropdown-item" href="{{ url('lang/de') }}" data-language="de">--}}
{{--          <i class="flag-icon flag-icon-de"></i> German--}}
{{--        </a>--}}
{{--        <a class="dropdown-item" href="{{ url('lang/pt') }}" data-language="pt">--}}
{{--          <i class="flag-icon flag-icon-pt"></i> Portuguese--}}
{{--        </a>--}}
{{--      </div> --}}
{{--      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true">--}}
{{--        @if (App::currentLocale() === 'ar')--}}
{{--          <i class="flag-icon flag-icon-eg"></i>--}}
{{--          <span class="selected-language">العربية</span>--}}
{{--        @else--}}
{{--          <i class="flag-icon flag-icon-us"></i>--}}
{{--          <span class="selected-language">English</span>--}}
{{--        @endif--}}
{{--      </a>--}}
{{--      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">--}}
{{--        <a class="dropdown-item" href="{{ route('lang', 'en') }}" data-language="en">--}}
{{--          <i class="flag-icon flag-icon-us"></i> English--}}
{{--        </a>--}}
{{--        <a class="dropdown-item" href="{{ route('lang', 'ar') }}" data-language="eg">--}}
{{--          <i class="flag-icon flag-icon-eg"></i> العربية--}}
{{--        </a>--}}
{{--      </div>--}}
{{--    </li>--}}
    <li class="nav-item d-none d-lg-block">
      @if (session()->has('theme'))
        @if (session()->get('theme') == 'light')
          <a href="{{ route('admin.theme', 'dark') }}" class="nav-link nav-link-style">
            <i class="ficon" data-feather="moon"></i>
          </a>
        @else
          <a href="{{ route('admin.theme', 'light') }}" class="nav-link nav-link-style">
            <i class="ficon" data-feather="sun"></i>
          </a>
        @endif
      @else
        <a class="nav-link nav-link-style">
          <i class="ficon" data-feather="{{ $configData['theme'] === 'dark' ? 'sun' : 'moon' }}"></i>
        </a>
      @endif

    </li>

{{--    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>--}}
{{--      <div class="search-input">--}}
{{--        <div class="search-input-icon"><i data-feather="search"></i></div>--}}
{{--        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">--}}
{{--        <div class="search-input-close"><i data-feather="x"></i></div>--}}
{{--        <ul class="search-list search-list-main"></ul>--}}
{{--      </div>--}}
{{--    </li>--}}

    {{-- <li class="nav-item dropdown dropdown-cart me-25">
                    <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="ficon" data-feather="shopping-cart"></i>
                        <span class="badge rounded-pill bg-primary badge-up cart-item-count">6</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">My Cart</h4>
                                <div class="badge rounded-pill badge-light-primary">4 Items</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <div class="list-item align-items-center">
                                <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/1.png') }}"
                                    alt="donuts" width="62">
                                <div class="list-item-body flex-grow-1">
                                    <i class="ficon cart-item-remove" data-feather="x"></i>
                                    <div class="media-heading">
                                        <h6 class="cart-item-title"><a class="text-body"
                                                href="{{ url('app/ecommerce/details') }}">
                                                Apple
                                                watch 5</a></h6><small class="cart-item-by">By Apple</small>
                                    </div>
                                    <div class="cart-item-qty">
                                        <div class="input-group">
                                            <input class="touchspin-cart" type="number" value="1">
                                        </div>
                                    </div>
                                    <h5 class="cart-item-price">$374.90</h5>
                                </div>
                            </div>
                            <div class="list-item align-items-center">
                                <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/7.png') }}"
                                    alt="donuts" width="62">
                                <div class="list-item-body flex-grow-1">
                                    <i class="ficon cart-item-remove" data-feather="x"></i>
                                    <div class="media-heading">
                                        <h6 class="cart-item-title"><a class="text-body"
                                                href="{{ url('app/ecommerce/details') }}">
                                                Google
                                                Home Mini</a></h6><small class="cart-item-by">By Google</small>
                                    </div>
                                    <div class="cart-item-qty">
                                        <div class="input-group">
                                            <input class="touchspin-cart" type="number" value="3">
                                        </div>
                                    </div>
                                    <h5 class="cart-item-price">$129.40</h5>
                                </div>
                            </div>
                            <div class="list-item align-items-center">
                                <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/2.png') }}"
                                    alt="donuts" width="62">
                                <div class="list-item-body flex-grow-1">
                                    <i class="ficon cart-item-remove" data-feather="x"></i>
                                    <div class="media-heading">
                                        <h6 class="cart-item-title"><a class="text-body"
                                                href="{{ url('app/ecommerce/details') }}">
                                                iPhone 11 Pro</a></h6><small class="cart-item-by">By Apple</small>
                                    </div>
                                    <div class="cart-item-qty">
                                        <div class="input-group">
                                            <input class="touchspin-cart" type="number" value="2">
                                        </div>
                                    </div>
                                    <h5 class="cart-item-price">$699.00</h5>
                                </div>
                            </div>
                            <div class="list-item align-items-center">
                                <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/3.png') }}"
                                    alt="donuts" width="62">
                                <div class="list-item-body flex-grow-1">
                                    <i class="ficon cart-item-remove" data-feather="x"></i>
                                    <div class="media-heading">
                                        <h6 class="cart-item-title"><a class="text-body"
                                                href="{{ url('app/ecommerce/details') }}">
                                                iMac
                                                Pro</a></h6><small class="cart-item-by">By Apple</small>
                                    </div>
                                    <div class="cart-item-qty">
                                        <div class="input-group">
                                            <input class="touchspin-cart" type="number" value="1">
                                        </div>
                                    </div>
                                    <h5 class="cart-item-price">$4,999.00</h5>
                                </div>
                            </div>
                            <div class="list-item align-items-center">
                                <img class="d-block rounded me-1" src="{{ asset('images/pages/eCommerce/5.png') }}"
                                    alt="donuts" width="62">
                                <div class="list-item-body flex-grow-1">
                                    <i class="ficon cart-item-remove" data-feather="x"></i>
                                    <div class="media-heading">
                                        <h6 class="cart-item-title"><a class="text-body"
                                                href="{{ url('app/ecommerce/details') }}">
                                                MacBook Pro</a></h6><small class="cart-item-by">By Apple</small>
                                    </div>
                                    <div class="cart-item-qty">
                                        <div class="input-group">
                                            <input class="touchspin-cart" type="number" value="1">
                                        </div>
                                    </div>
                                    <h5 class="cart-item-price">$2,999.00</h5>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-menu-footer">
                            <div class="d-flex justify-content-between mb-1">
                                <h6 class="fw-bolder mb-0">Total:</h6>
                                <h6 class="text-primary fw-bolder mb-0">$10,999.00</h6>
                            </div>
                            <a class="btn btn-primary w-100" href="{{ url('app/ecommerce/checkout') }}">Checkout</a>
                        </li>
                    </ul>
                </li> --}}
    {{-- <li class="nav-item dropdown dropdown-notification me-25">
                    <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        <span class="badge rounded-pill bg-danger badge-up">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                                <div class="badge rounded-pill badge-light-primary">6 New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar">
                                            <img src="{{ asset('images/portrait/small/avatar-s-15.jpg') }}" alt="avatar"
                                                width="32" height="32">
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Congratulation Sam
                                                🎉</span>winner!</p>
                                        <small class="notification-text"> Won the monthly best seller badge.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar">
                                            <img src="{{ asset('images/portrait/small/avatar-s-3.jpg') }}" alt="avatar"
                                                width="32" height="32">
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">New
                                                message</span>&nbsp;received</p>
                                        <small class="notification-text"> You have 10 unread messages</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content">MD</div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Revised Order
                                                👋</span>&nbsp;checkout</p>
                                        <small class="notification-text"> MD Inc. order updated</small>
                                    </div>
                                </div>
                            </a>
                            <div class="list-item d-flex align-items-center">
                                <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
                                <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                            </div>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Server
                                                down</span>&nbsp;registered</p>
                                        <small class="notification-text"> USA Server is down due to hight CPU
                                            usage</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Sales
                                                report</span>&nbsp;generated</p><small class="notification-text"> Last
                                            month sales report generated</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content"><i class="avatar-icon"
                                                    data-feather="alert-triangle"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage
                                        </p><small class="notification-text"> BLR Server using high memory</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer">
                            <a class="btn btn-primary w-100" href="javascript:void(0)">Read all notifications</a>
                        </li>
                    </ul>
                </li> --}}
    <li class="nav-item dropdown dropdown-user">
      <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true">
        <div class="user-nav d-sm-flex d-none">
          {{-- explode(' ', auth()->user()->name)[0] --}}
          <span class="user-name fw-bolder"> {{ __('Hi') . ' ' . explode(' ', auth()->user()->name)[0] }}</span>
          <span class="user-status">{{ auth()->user()->getRoleNames()[0] }}</span>
          {{-- auth()->user()->getRoleNames()[0] --}}
        </div>
        <span class="avatar">
          <img class="round" src="{{ asset('images/avatar.png') }}" alt="avatar" height="40" width="40">
          <span class="avatar-status-online"></span>
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

        @if (Auth::check())
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
              <i class="me-50" data-feather="power"></i>
              {{ __('Logout') }}
            </a>
          </form>
        @else
          <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
            <i class="me-50" data-feather="log-in"></i> Login
          </a>
        @endif
      </div>
    </li>
  </ul>
</div>
</nav>

{{-- Search Start Here --}}
<ul class="main-search-list-defaultlist d-none">
  <li class="d-flex align-items-center">
    <a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Files</h6>
    </a>
  </li>
  {{-- <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('app/file-manager') }}">
      <div class="d-flex">
        <div class="me-75">
          <img src="{{ asset('images/icons/xls.png') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">Two new item submitted</p>
          <small class="text-muted">Marketing Manager</small>
        </div>
      </div>
      <small class="search-data-size me-50 text-muted">&apos;17kb</small>
    </a>
  </li> --}}
  <li class="d-flex align-items-center">
    <a href="javascript:void(0);">
      <h6 class="section-label mt-75 mb-0">Members</h6>
    </a>
  </li>
  {{--  <li class="auto-suggestion">
    <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('app/user/view') }}">
      <div class="d-flex align-items-center">
        <div class="avatar me-75">
          <img src="{{ asset('images/portrait/small/avatar-s-8.jpg') }}" alt="png" height="32">
        </div>
        <div class="search-data">
          <p class="search-data-title mb-0">John Doe</p>
          <small class="text-muted">UI designer</small>
        </div>
      </div>
    </a>
  </li> --}}
</ul>

{{-- if main search not found! --}}
<ul class="main-search-list-defaultlist-other-list d-none">
  <li class="auto-suggestion justify-content-between">
    <a class="d-flex align-items-center justify-content-between w-100 py-50">
      <div class="d-flex justify-content-start">
        <span class="me-75" data-feather="alert-circle"></span>
        <span>No results found.</span>
      </div>
    </a>
  </li>
</ul>
{{-- Search Ends --}}
<!-- END: Header-->
