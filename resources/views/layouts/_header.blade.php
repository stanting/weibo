    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Weibo APP</a>
            <ul class="navbar-nav justify-content-end">
                @if (Auth::check())
                    <li class="nav-item"><a class="nav-link" href="#">User list</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">Personal</a>
                            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">Edit profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="logout" href="#">
                                <form action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-block btn-danger" type="submit">Logout</button>
                                </form>
                            </a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('help') }}">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
