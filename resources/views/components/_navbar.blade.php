<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="/img/Immagine-removebg-preview.png" class="logo-custom" alt="logo" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Annunci
          </a>
          <ul class="dropdown-menu bg-custom border-0" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('article.index')}}">Tutti gli annunci</a></li>
            <li><a class="dropdown-item" href="{{route('article.create')}}">Crea Annuncio</a></li>
          </ul>
        </li>
        @if (Auth::user() && !Auth::user()->revisor_flag)
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('contact.index')}}">Lavora con noi</a>
        </li>
        @elseif (Auth::user() && Auth::user()->revisor_flag)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Revisor 
            @if(App\Models\Article::notifyArticlesForRevisor() > 0)
            <button class="rounded-circle bg-danger p-1 ms-2 border-0"></button>
            @endif
          </a>
          <ul class="dropdown-menu bg-custom border-0" aria-labelledby="navbarDropdown">
            <li>
             <a class="dropdown-item" aria-current="page" href="{{route('revisor.index')}}">Da Revisionare <button class="bg-danger p-1 border-0">{{App\Models\Article::notifyArticlesForRevisor()}}</button></a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('revisor.bin')}}">Cestino</a>
            </li>
          </ul>
        </li>
        @endif

      </ul>


      <ul class="navbar-nav">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropstart d-flex justify-content-center align-items-center">
                     <a id="navbarDropdown" class="btn dropdown-lg-toggle nav-link d-flex justify-content-center align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}   
                        <i class="fas fa-user ms-2"></i>
                    </a>

                    <ul class="dropdown-menu me-2 bg-custom border-0">
                      <a class="dropdown-item p-0 ps-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
  </div>
</nav>
