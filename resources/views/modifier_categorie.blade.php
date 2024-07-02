<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>



    <form method="post" action="{{ route('update_categorie', $categories->id) }}">
        @csrf
        <h3>Modification de Catégorie </h3>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom catégorie</label>
            <input type="text" value="{{ $categories->nom_catid }}" class="form-control" id="nom"
                aria-describedby="Nom categorie" name="nom">
        </div>
        <div>
            @error('nom')
                <li class="list-unstyled text-danger">{{ $message }}</li>
            @enderror()
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

    <div class="mt-5 text-center"><a href="{{ route('accueil') }}">
            <h5 class="">Retour</h5>
        </a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
