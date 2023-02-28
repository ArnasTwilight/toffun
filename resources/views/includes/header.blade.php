<div class="row">
    <header class="header p-0 mb-4 col-md-12 bg-color">
        <nav class="header-nav d-flex">
            <ul class="header-nav-list__logo d-flex">
                <li>
                    <a href="{{ route('main.index') }}">
                        <div class="site-logo m-0"></div>
                    </a>
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
                    <a href="{{ route('character.index') }}">Character</a>
                </li>
                <li class="header-nav-list__item d-flex">
                    <a href="{{ route('item.index') }}">Item</a>
                    <div class="header-nav-list__icon"></div>
                </li>
                <li class="header-nav-list__item">
                    <a href="{{ route('map.index') }}">Maps</a>
                </li>
            </ul>
            <ul class="header-nav-list__user d-flex">
                @guest
                    <li class="header-nav-list__user-name">
                        <a class="button" href="{{ route('login') }}"> Login </a>
                    </li>
                @else
                    <li class="header-nav-list__user-img">
                        <img src="{{ asset( 'storage/' . Auth::user()->image ) }}" alt="user_img">
                    </li>
                    <li class="header-nav-list__user-name">
                        <a href="{{ route('personal.main.index') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="header-nav-list__user-name">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input class="button" type="submit" value="Logout">
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>
</div>
