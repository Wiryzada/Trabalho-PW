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
</head>

<body>
    <div class="sidebar">
        <p class="userName">Olá, {{ auth()->user()->name }}!</p>

        <ul>
            <li>
                <a href="{{ route('users.index') }}">Pedidos</a>
            </li>
            <li>
                <a href="{{ route('institutions.index') }}">Instituições</a>
            </li>
            <li>
                <a href="{{ route('courses.index') }}">Cursos</a>
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout">Sair</button>
        </form>
    </div>


    <div class="content">
        @yield('content')
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif !important;
        }

        body {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-width: 200px;
            width: 200px;
            height: 100%;
            background-color: #FBF9FE;
            padding: 20px 0;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            width: 100%;
            cursor: pointer;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar ul li {
            margin: 0;
            padding: 0;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px;
            padding-left: 20px;
            background-color: #FBF9FE;
            border-bottom: none;
            text-decoration: none;
            color: #000;
            border-radius: 5px;
            transition: all 0.2s ease-in-out;

            font-weight: 400;
            font-size: 14px;

        }

        .sidebar ul li a:hover {
            background-color: #433FFF;
            color: #fff;
        }

        .userName {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .logout-form {
            width: 100%;
            padding: 20px;
        }

        .logout {
            font-weight: 400;
            font-size: 14px;
            background-color: #433FFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            width: 100%;

            display: flex;
            justify-content: flex-start;
            padding-left: 20px;
        }

        .content {
            width: 100%;
            height: 100%;
            margin-left: 200px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .title-header {
            font-weight: 700;
            font-size: 32px;
        }

        .actions {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #433FFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;

            font-weight: 400;
            font-size: 16px;
        }

        .actions:hover {
            background-color: #2420DD;
            color: #fff;
        }

        .actions a {
            color: #fff;
            text-decoration: none;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .styled-table thead {

            border-radius: 5px;
        }

        .styled-table thead tr {
            background-color: #433FFF;
            color: #ffffff;
            text-align: left;
            border-radius: 5px;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #433FFF;
        }

        .actions-table {
            display: flex;
            gap: 10px;
            width: 20px;
        }

        .actions-table a {
            color: #433FFF;
            text-decoration: none;
        }

        .actions-table a:hover {
            color: #2420DD;
        }

        .actions-table button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            color: #433FFF;
        }

        .actions-table button:hover {
            color: #2420DD;
        }

        form {
            width: 100%;
        }

        .form-inputs {
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 500px;
            margin-bottom: 20px;
        }

        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 500px;
            margin-bottom: 20px;
        }

        select option {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 500px;
            margin-bottom: 20px;
        }

        .form-buttons {
            display: flex;
            gap: 10px;
        }

        .form-button-cancel {
            background-color: #fff;
            color: #433FFF;
            border: 1px solid #433FFF;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            width: 200px;
            margin-top: 10px;

            font-weight: 400;
            font-size: 14px;
        }

        .form-button-cancel a {
            color: #433FFF;
            text-decoration: none;
        }

        .form-button-cancel:hover {
            background-color: #433FFF;
            color: #fff;
        }

        .form-button {
            background-color: #433FFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            width: 200px;
            margin-top: 10px;

            font-weight: 400;
            font-size: 14px;
        }

        .form-button:hover {
            background-color: #2420DD;
            color: #fff;
        }
    </style>
</body>

</html>