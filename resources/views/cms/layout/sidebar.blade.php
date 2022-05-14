<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo" style="width:200px;height:auto">
                    <a class="pjax" href="{{route('cms.dashboard')}}" style="width:200px;height:auto"><img
                            style="width:100px;height:auto" src="cms-html/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                {{-- <li class="sidebar-item @if( request()->url() ==  route('cms.dashboard'))active @endif">
                    <a href="{{route('cms.dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li> --}}

                <li class="sidebar-item @if( Str::contains(request()->url(),[ route('cms.match')]))active @endif">
                    <a href="{{route('cms.match')}}" class='sidebar-link pjax'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Match</span>
                    </a>
                </li>

                <li class="sidebar-item @if( Str::contains(request()->url(),[ route('cms.bet')]))active @endif">
                    <a href="{{route('cms.bet')}}" class='sidebar-link pjax'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Bet</span>
                    </a>
                </li>

                <li
                    class="sidebar-item  has-sub ">
                    <a class='sidebar-link' style="cursor: pointer">
                        <i class="bi bi-stack"></i>
                        <span>Page content</span>
                    </a>
                    <ul
                        class="submenu">
                        <li
                            class="submenu-item">
                            <a class="pjax" href="{{route('cms.match')}}">Home - Banner</a>
                        </li>
                        <li
                            class="submenu-item">
                            <a class="pjax"  href="{{route('cms.bet')}}">Home - Trailer</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>