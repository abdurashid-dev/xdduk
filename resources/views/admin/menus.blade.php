<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'user1')
            {{ route('admin.dashboard') }}
            @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'user3')
            {{route('admin.index')}}
            @else
            {{route('admin.user')}}
            @endif"
               class="nav-link @if(Request::getRequestUri() == '/admin' || Request::getRequestUri() == '/admin/dashboard' ||Request::getRequestUri() == '/admin/cabinet') active @endif">
                <i class="nav-icon fs-5 bi bi-menu-app"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user()->role == 'user2')
            <li class="nav-item">
                <a href="{{ route('admin.user.table') }}"
                   class="nav-link {{(request()->is('admin/user/documents*'))? 'active':''}}">
                    <i class="nav-icon far fa-folder"></i>
                    <p>
                        Hujjatlar
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.send') }}"
                   class="nav-link {{(request()->is('admin/user/send*'))? 'active':''}}">
                    <i class="nav-icon fab fa-telegram-plane"></i>
                    <p>
                        Hujjat yuborish
                    </p>
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->role == "user1")
            <li class="nav-item">
                <a href="{{route('admin.offers.index')}}"
                   class="nav-link {{(request()->is('admin/offers*'))? 'active':''}}">
                    <i class="fas fa-file-medical nav-icon"></i>
                    <p>Hujjatlarni shakllantirish</p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('admin/document*') || request()->is('admin/pages*')) menu-open @endif">
                <a href="#"
                   class="nav-link @if (request()->is('admin/document*') || request()->is('admin/pages*')) active @endif">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Loyihalar
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.documents.index')}}"
                           class="nav-link {{ (request()->is('admin/document*'))? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Barcha loyihalar <span class="badge badge-primary float-right">{{$all}}</span></p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.users.index')}}"
                   class="nav-link {{(request()->is('admin/users*'))? 'active':''}}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        MCHJ tashkilotlar
                    </p>
                </a>
            </li>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->role == "user3")
            <li class="nav-item">
                <a href="{{route('admin.leaders.index')}}"
                   class="nav-link {{(request()->is('admin/leaders*'))? 'active':''}}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                        Rahbariyat
                    </p>
                </a>
            </li>
            <li class="nav-item @if(request()->is('admin/menus*') || request()->is('admin/pages*')) menu-open @endif">
                <a href="#"
                   class="nav-link @if (request()->is('admin/menus*') || request()->is('admin/pages*')) active @endif">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Menyular
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.menus.index')}}"
                           class="nav-link {{ (request()->is('admin/menus*'))? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Menular</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.pages.index')}}"
                           class="nav-link {{ (request()->is('admin/pages*'))? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sahifalar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.sliders.index')}}"
                   class="nav-link {{(request()->is('admin/sliders*'))? 'active':''}}">
                    <i class="nav-icon bi bi-sliders"></i>
                    <p>
                        Slayderlar
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.categories.index')}}"
                   class="nav-link {{(request()->is('admin/categories*'))? 'active':''}}">
                    <i class="nav-icon bi bi-clipboard-plus"></i>
                    <p>
                        Yangiliklar kategoriyalari
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.blogs.index')}}"
                   class="nav-link {{(request()->is('admin/blogs*'))? 'active':''}}">
                    <i class="nav-icon bi bi-newspaper"></i>
                    <p>
                        Yangiliklar
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.videos.index')}}"
                   class="nav-link {{(request()->is('admin/videos*'))? 'active':''}}">
                    <i class="nav-icon bi bi-youtube"></i>
                    <p>
                        Videolar
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.links.index')}}"
                   class="nav-link {{(request()->is('admin/link*'))? 'active':''}}">
                    <i class="nav-icon bi bi-link-45deg"></i>
                    <p>
                        Foydali linklar
                    </p>
                </a>
            </li>
            <li class="nav-item @if(Str::substr(Request::getRequestUri(), 0, 15) == '/admin/settings' ||Str::substr(Request::getRequestUri(), 0, 13) == '/admin/social') menu-open @endif">
                <a href="#"
                   class="nav-link @if (Str::substr(Request::getRequestUri(), 0, 15) == '/admin/settings' ||Str::substr(Request::getRequestUri(), 0, 13) == '/admin/social') active @endif">
                    <i class="nav-icon bi bi-gear"></i>
                    <p>
                        Sozlamalar
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.settings.index')}}"
                           class="nav-link {{ (request()->is('admin/settings*'))? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Matn sozlamalari</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.social.index')}}"
                           class="nav-link {{ (request()->is('admin/social*'))? 'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ijtimoiy tarmoqlar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item mb-3">
                <a href="{{route('admin.optimize')}}" class="nav-link">
                    <i class="nav-icon fas fa-broom"></i>
                    <p>
                        Optimize
                    </p>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a href="/"
               class="nav-link">
                <i class="nav-icon fas fa-arrow-left"></i>
                <p>
                    Orqaga
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
