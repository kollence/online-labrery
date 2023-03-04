<ul class="nav">
    <li class="nav-item bg-secondary border rounded border-warning mr-auto">
        <a class="nav-link active text-warning" href="/home">Online Library</a>
    </li>

    @if (Route::has('login'))

        @auth
            @if(auth()->user()->isLibrarian())
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/books') }}">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/authors') }}">Authors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/users') }}">Users</a>
            </li>
            @else
            <li class="nav-item">
                <a href="/profile" class="nav-link">Profile</a>
            </li>
            @endif
            <div class="nav-item ml-auto">
            <form method="POST" action="{{ route('logout') }}" class="nav-item">
                    @csrf

                    <a href="route('logout')"  class="nav-link"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
            
        @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Log in</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
            @endif
        @endauth
    </li>
    @endif
</ul>