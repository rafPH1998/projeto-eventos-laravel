<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="collapse navbar-collapse" id="navbar">
            <a href="{{route('event.index')}}" class="navbar-brand">
              <img src="/images/hdcevents_logo.svg" alt="HDC Events">
            </a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="{{route('event.index')}}" class="nav-link">Eventos</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('event.create')}}" class="nav-link">Criar Eventos</a>
              </li>
                @auth
                    <li class="nav-item">
                        <a href="{{ route('event.myevents') }}" class="nav-link">Meus eventos</a>
                    </li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                            Sair
                        </a>
                    </form>
                @endauth
            </ul>
          </div>
        </nav>
      </header>

      @yield('content')
      <footer>
        <p>HDC Events - Rafael &copy; 2022</p>
      </footer>

      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>
