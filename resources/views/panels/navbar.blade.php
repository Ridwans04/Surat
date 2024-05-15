@if ($configData['mainLayoutType'] === 'horizontal' && isset($configData['mainLayoutType']))
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}"
        data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="brand-logo">
                        </span>
                        <h2 class="brand-text mb-0">Surat</h2>
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
            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                        data-feather="menu"></i></a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="nav-item d-none d-lg-block">
                {{-- <a href="javascript:void(0);" id="theme-toggle" class="nav-link">
                    <i data-feather="{{ $theme === 'dark' ? 'sun' : 'moon' }}"></i>
                </a> --}}
            </li>
        </ul>
    </div>
    <ul class="nav navbar-nav align-items-center ms-auto">
        <li class="nav-item dropdown dropdown-user">
            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                data-bs-toggle="dropdown" aria-haspopup="true">
                <div class="user-nav d-sm-flex d-none">
                    <span class="user-name fw-bolder">
                        {{ Auth::user()->username }}
                    </span>
                    <p style="white-space: nowrap" class="font-medium-1">
                        @foreach(session('role') as $key )
                        <span class="badge bg-success ">
                            <i data-feather="star" class="me-25"></i>
                            <span>{{ str_replace("_", " ",$key)}}</span>
                        </span>
                        @endforeach
                    </p>
                    
                </div>
                <span class="avatar">
                    <img class="round" src="{{ asset('images/logo/profil.png') }}" alt="avatar" height="40"
                        width="40">
                    <span class="avatar-status-online"></span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                @if (Auth::check())
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="me-50" data-feather="power"></i> Logout
                    </a>
                @else
                    <a class="dropdown-item" href="{{ route('login') }}">
                        <i class="me-50" data-feather="log-in"></i> Login
                    </a>
                @endif
        </li>
    </ul>
</div>
</nav>
<!-- END: Header-->
