<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('page-title')
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password">
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Lembrar-me</label>
            </div>
            <div>
                <button type="submit">Entrar</button>
                <a href="{{ route('student-voucher.create') }}">Solicitar Carteirinha</a>
            </div>
        </form>
    </div>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .container {
            width: 500px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</body>

</html>