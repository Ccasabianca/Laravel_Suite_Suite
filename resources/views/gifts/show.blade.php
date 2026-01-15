<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>{{ $gift->name }}</title>
</head>

<body>
    <h1>{{ $gift->name }}</h1>

    @if(session('message'))
    <p style="color: green">{{ session('message') }}</p>
    @endif

    <p><strong>Nom :</strong> {{ $gift->name }}</p>

    @if(!empty($gift->url))
    <p><strong>URL :</strong> <a href="{{ $gift->url }}" target="_blank">{{ $gift->url }}</a></p>
    @endif

    @if(!empty($gift->details))
    <p><strong>Détails :</strong> {{ $gift->details }}</p>
    @endif

    <p><strong>Prix :</strong> {{ number_format($gift->price, 2, ',', ' ') }} €</p>

    <p>
        <a href="{{ route('gifts.index') }}">Retour</a>
        <a href="{{ route('gifts.edit', $gift) }}">Modifier</a>
    </p>
</body>

</html>