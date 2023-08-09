<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home.index')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Home</a>
          </li>
          @if (!auth()->check())
              <li class="nav-item">
                <a class="nav-link" href="/login">Accedi</a>
              </li>          
              <li class="nav-item">
                <a class="nav-link" href="/register">Registrati</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('pictures.index')}}">Quadri</a>
              </li>
          @else

          <li class="nav-item">
            <a class="nav-link" href="{{route('pictures.index')}}">Quadri</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('pictures.create')}}">Aggiungi un quadro</a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.profile')}}">Profilo</a>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.pictures')}}">I miei quadri</a>

            </li>
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button class="btn btn-sm btn-secondary">Esci</button>
              </form>
            </li>

          @endif
          
        </ul>
      </div>
    </div>
  </nav>