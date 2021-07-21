<header>

    <div id="app">
        <nav class="navbar navbar-expand-md">
            
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
            
            <div class="links">
                <a href="{{route('articles.index')}}">Vai agli articoli</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                <ul class="navbar ml-auto">
                    <li>
                        <div class="flex-center position-ref full-height">
                        @if (Route::has('login'))
                            <div class="top-right links">
                            @auth
                                <a href="{{route('adminhome')}}">Admin Section</a>
                        @else
                            @endauth
                            </div>
                        @endif
                        </div>
                    </li>    

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a> 

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                                
                        </li>
                    @endguest
                </ul>
            </div>
          
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    
    
    </div>

</header>