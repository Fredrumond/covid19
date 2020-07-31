<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONVID-19</title>
    <link rel="stylesheet" href="css/cadastro.css"/>
</head>
<body>
    <div class="cadastro">
        <div class="cadastro-left">
            <article class="cadastro-left-box">
                <header class="cadastro-box-headline">
                    <h1>Cadastro</h1>
                </header>

                

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <label>
                        <span class="field">Nome</span>
                        <input type="name" name="name" placeholder="Informe seu nome" required/>
                    </label>

                    <label>
                        <span class="field">E-mail:</span>
                        <input type="email" name="email" placeholder="Informe seu e-mail" required/>
                    </label>

                    <label>
                        <span class="field">Senha:</span>
                        <input type="password" name="password" placeholder="Informe sua senha" required/>
                    </label>

                    <label>
                        <span class="field">Confirmar senha:</span>
                        <input type="password" name="password_confirmation" placeholder="Repita sua senha" required/>
                    </label>

                    <button class="gradient gradient-orange radius icon-sign-in">Cadastrar</button>
                </form>
            </article>
        </div>

        <div class="cadastro-right">
            <img src="img/undraw_social_distancing.png" alt="">
        </div>
    </div>
</body>
</html>
