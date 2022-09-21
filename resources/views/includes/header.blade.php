<div class="row">
    <header class="header p-0 mb-4 col-md-12 bg-color">
        <nav class="header-nav d-flex">
            <ul class="header-nav-list__logo d-flex">
                <li>
                    <a href="{{ route('main.index') }}"><div class="site-logo m-0"></div></a>
                </li>
            </ul>
            <ul class="header-nav-list d-flex">
                <li class="header-nav-list__item active-header">
                    <a href="{{ route('main.index') }}">Home</a>
                </li>
                <li class="header-nav-list__item d-flex">
                    <a href="{{ route('post.index') }}">News</a>
                    <div class="header-nav-list__icon"></div>
                </li>
                <li class="header-nav-list__item">
                    <a href="#">Character</a>
                </li>
                <li class="header-nav-list__item d-flex">
                    <a href="#">Item</a>
                    <div class="header-nav-list__icon"></div>
                </li>
                <li class="header-nav-list__item">
                    <a href="#">Gacha</a>
                </li>
                <li class="header-nav-list__item">
                    <a href="{{ route('map.index') }}">Map</a>
                </li>
            </ul>
            <ul class="header-nav-list__user d-flex">
                <li class="header-nav-list__user-img">
                    <img src="{{ asset('assets/image/user/avatar-1.png') }}" alt="user_img">
                </li>
                <li class="header-nav-list__user-name">
                    <a href="#">user name</a>
                </li>
            </ul>
        </nav>
    </header>
</div>
