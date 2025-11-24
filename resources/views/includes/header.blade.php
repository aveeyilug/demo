<nav>
    <ul>
        @guest
            <li><a href="{{ route('view.register') }}">Регистрация</a></li>
            <li><a href="{{ route('view.login') }}">Авторизация</a></li>
        @endguest
        @auth
            <li><a href="{{ route('logout') }}">Выход</a></li>
            <li><a href="requests.html">Заявки</a></li>
            @if (auth()->user()->role === 'admin')
                <li><a href="{{ route('view.admin') }}">Админ-панель</a></li>
            @endif
        @endauth
</ul>
</nav>
