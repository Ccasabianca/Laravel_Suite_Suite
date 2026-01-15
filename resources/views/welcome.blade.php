<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Cadeaux</title>
</head>

<body>
    <h1>Liste des cadeaux</h1>

    @if(session('message'))
    <p style="color: green">{{ session('message') }}</p>
    @endif

    <p>
        <a href="{{ route('gifts.create') }}">Créer un cadeau</a>
    </p>

    @if($gifts->isEmpty())
    <p>Aucun cadeau.</p>
    @else
    <ul>
        @foreach($gifts as $gift)
        <li>
            <strong>{{ $gift->name }}</strong>
            — {{ number_format($gift->price, 2, ',', ' ') }} €

            <a href="{{ route('gifts.show', $gift) }}">voir</a>
            <a href="{{ route('gifts.edit', $gift) }}">modifier</a>

            <form action="{{ route('gifts.destroy', $gift) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Supprimer ce cadeau ?')">
                    supprimer
                </button>
            </form>
        </li>
        @endforeach
    </ul>
    @endif
</body>

</html>