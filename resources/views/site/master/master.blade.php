<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19</title>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <nav class="menu">
        <div class="logo">
            <h1>Painel COVID-<span>19</span></h1>
        </div>
        <div class="navigation">
            <ul>
                <li>
                    <a href="#" class="button">
                        Entrar
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')   
    </div>

    <footer class="footer">
        <div class="inner">
          <p><a href="https://github.com/Fredrumond">Frederico Xavier Drumond</a></p>
        </div>
      </footer>
</body>
</html>