<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="/img/Immagine-removebg-preview.png" width="7%" alt="">
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Revisor <span class="rounded-circle bg-danger  p-2">{{App\Models\Article::notifyArticlesForRevisor()}}</span>
          </a>
          <ul class="dropdown-menu bg-custom border-0" aria-labelledby="navbarDropdown">
            <li>
             <a class="nav-link active" aria-current="page" href="{{route('revisor.index')}}">Da Revisionare</a>
            </li>
            <li>
               <a class="dropdown-item" href="{{route('revisor.bin')}}">Cestino</a>
            </li>
          </ul>
        </li>
        @endif

      </ul>


      <ul class="navbar-nav pe-2">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}   <i class="fas fa-user"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right border-0 bg-custom" aria-labelledby="navbarDropdown">
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
  </div>
</nav>
