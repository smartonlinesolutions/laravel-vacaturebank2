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
            <li><a href="{{ route('vacatures.index') }}">Vacature overzicht</a></li>
            <li><a href="{{ route('vacatures.create') }}">Nieuwe vacature aanmaken</a></li>
        </ul>
    </nav>
    <main>{{ $slot }}</main>
</body>
</html>