<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ request()->routeIs('backend.dashboard') ? 'active' : '' }}">
        <a href="{{ route('backend.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('backend.category.*') ? 'active' : '' }}">
        <a href="{{ route('backend.category.index') }}" class="menu-link ">
            <i class="menu-icon tf-icons bx bx-category-alt"></i>
            <div data-i18n="Analytics">Categories</div>
        </a>
    </li>

    <!-- Layouts -->
    {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Layouts</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Without menu</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Without navbar</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Container</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                </a>
            </li>
        </ul>
    </li> --}}

</ul>