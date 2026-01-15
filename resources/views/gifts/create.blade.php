<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Créer un cadeau</title>
</head>

<body>
    <h1>Créer un cadeau</h1>

    @if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('gifts.store') }}" method="POST">
        @csrf

        <p>
            <label>Nom</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            <label>URL (http/https)</label><br>
            <input type="text" name="url" value="{{ old('url') }}" placeholder="https://...">
        </p>

        <p>
            <label>Détails</label><br>
            <textarea name="details">{{ old('details') }}</textarea>
        </p>

        <p>
            <label>Prix</label><br>
            <input type="text" name="price" value="{{ old('price') }}" placeholder="19.99">
        </p>

        <button type="submit">Créer</button>
        <a href="{{ route('gifts.index') }}">Annuler</a>
    </form>
</body>

</html>