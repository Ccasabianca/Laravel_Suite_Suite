<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Modifier {{ $gift->name }}</title>
</head>

<body>
    <h1>Modifier un cadeau</h1>

    @if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('gifts.update', $gift) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Nom</label><br>
            <input type="text" name="name" value="{{ old('name', $gift->name) }}">
        </p>

        <p>
            <label>URL (http/https)</label><br>
            <input type="text" name="url" value="{{ old('url', $gift->url) }}">
        </p>

        <p>
            <label>Détails</label><br>
            <textarea name="details">{{ old('details', $gift->details) }}</textarea>
        </p>

        <p>
            <label>Prix</label><br>
            <input type="text" name="price" value="{{ old('price', $gift->price) }}">
        </p>

        <button type="submit">Enregistrer</button>
        <a href="{{ route('gifts.show', $gift) }}">Annuler</a>
    </form>
</body>

</html>