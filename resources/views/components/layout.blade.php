<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Vacaturebank' }}</title>

    <style>
        nav svg {
            width: 25px;
            height: 25px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            @auth
                <li><span>Ingelogd als {{ auth()->user()->name }}</span></li>
                <li><a href="{{ route('vacatures.index') }}">Vacature overzicht</a></li>
                <li><a href="{{ route('vacatures.create') }}">Nieuwe vacature aanmaken</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Uitloggen</button>
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}">Inloggen</a></li>
                <li><a href="{{ route('vacatures.index') }}">Vacature overzicht</a></li>
            @endguest
        </ul>
    </nav>
    <main>{{ $slot }}</main>
</body>
</html>