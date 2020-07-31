<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19</title>
    <link rel="stylesheet" href="css/dashboard.css"/>
</head>
<body>
    <nav class="menu">
        <div class="logo">
            <h1>Painel COVID-<span>19</span></h1>
        </div>
        <div class="navigation">
            <ul>
                <li>
                    <a class="button" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')   
    </div>
    @yield('script')
</body>
</html>