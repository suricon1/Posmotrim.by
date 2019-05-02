<div class="header-menu" style="display: block;">
    <nav style="display: block;">
        <ul class="main-menu">
            @foreach($regions as $title => $items)
                @include('components.menu-item', ['items' => $items, 'title' => $title, 'trig' => false])
            @endforeach

            @include('components.menu-item', ['items' => $tags, 'title' => 'Тэги', 'trig' => true])

        </ul>
    </nav>
</div>