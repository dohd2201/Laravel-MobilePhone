<nav id="menu">
    <ul>
        @foreach ($categories as $category)
            <li class="menu-item"><a
                    href="/category/{{ $category['id'] }}/{{ $category['slug'] }}">{{ strtoupper($category['name']) }}</a>
            </li>
        @endforeach

    </ul>

</nav>
