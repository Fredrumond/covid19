<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONVID-19</title>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>
    <div class="login">
        <div class="login-left">
            <article class="login-left-box">
                <header class="login-box-headline">
                    <h1>Login</h1>
                </header>

                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <label>
                        <span class="field">E-mail:</span>
                        <input type="email" name="email" placeholder="Informe seu e-mail" required/>
                    </label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <label>
                        <span class="field">Senha:</span>
                        <input type="password" name="password" placeholder="Informe sua senha" required/>
                    </label>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <button class="gradient gradient-orange radius icon-sign-in">Entrar</button>
                </form>
            </article>
        </div>

        <div class="login-right">
            <img src="img/undraw_coming_home_52ir.png" alt="">
        </div>
    </div>
</body>
</html>
