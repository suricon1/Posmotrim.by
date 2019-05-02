<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview {{$site_open ?? ''}}">
            <a href="#" class="nav-link {{$site_active ?? ''}}">
                <i class="nav-icon fa fa-folder"></i>
                <p>Сайт<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link{{$post_active ?? ''}}">
                        <p>Посты <span class="right badge badge-danger">{{$newPostsCount}}</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('countri.index')}}" class="nav-link{{$countri_active ?? ''}}">
                        <p>Страны</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('city.index')}}" class="nav-link{{$city_active ?? ''}}">
                        <p>Города</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tags.index')}}" class="nav-link{{$tag_active ?? ''}}">
                        <p>Тэги</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tag_desc.index')}}" class="nav-link{{$tag_desc_active ?? ''}}">
                        <p>Тэги-meta</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link{{$user_active ?? ''}}">
                        <p> Пользователи <span class="badge badge-info right">2</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comments.index') }}" class="nav-link{{$comment_active ?? ''}}">
                        <p>Комментарии @if($newCommentsCount)<span class="right badge badge-danger">{{$newCommentsCount}}</span>@endif</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscribers.index') }}" class="nav-link{{$subscrib_active ?? ''}}">
                        <p>Подписки</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview{{$vinograd_open ?? ''}}">
            <a href="#" class="nav-link{{$vinograd_active ?? ''}}">
                <i class="nav-icon fa fa-folder"></i>
                <p>Виноград<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('products.index')}}" class="nav-link{{$product_active ?? ''}}">
                        <p>Каталог сортов</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categorys.index')}}" class="nav-link{{$category_active ?? ''}}">
                        <p>Категории</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vinograd.comments.index')}}" class="nav-link{{$vinograd_comment_active ?? ''}}">
                        <p>Комментарии</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>Блог</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sliders.index')}}" class="nav-link{{$slider_active ?? ''}}">
                        <p>Слайдер</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>