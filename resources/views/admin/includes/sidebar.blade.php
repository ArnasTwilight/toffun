<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.main.index') }}" class="brand-link">
        <img src="{{asset('dist/img/toffun-logo.png')}}" alt="Toffun Logo" class="brand-image elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('storage/' . auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.user.show', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.main.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Main
                        </p>
                    </a>
                </li>

                <li class="nav-header">Character</li>
                <li class="nav-item">
                    <a href="{{ route('admin.character.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-person"></i>
                        <p>
                            Characters
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.weapon.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-shield"></i>
                        <p>
                            Weapons
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.matrix.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-microchip"></i>
                        <p>
                            Matrices
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.element.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-fire"></i>
                        <p>
                            Elements
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.spec.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-burst"></i>
                        <p>
                            Spec
                        </p>
                    </a>
                </li>

                <li class="nav-header">Other</li>
                <li class="nav-item">
                    <a href="{{ route('admin.rarity.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-palette"></i>
                        <p>
                            Rarity
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.food.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-bowl-food"></i>
                        <p>
                            Food
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.ingredient.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-apple-whole"></i>
                        <p>
                            Ingredients
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.relic.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-walkie-talkie"></i>
                        <p>
                            Relic
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gift.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-gift"></i>
                        <p>
                            Gift
                        </p>
                    </a>
                </li>

                <li class="nav-header">Post</li>
                <li class="nav-item">
                    <a href="{{ route('admin.post.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.comment.index') }}" class="nav-link">
                        <i class="nav-icon far fa-comment"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>

                <li class="nav-header">User</li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
