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

    <form method="post" action="form_prod_traitement">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom produit</label>
            <input type="text" class="form-control" id="nom" aria-describedby="Nom categorie" name="nom">
        </div>
        <div>
            @error('nom')
                <li class="list-unstyled text-danger">{{ $message }}</li>
            @enderror()
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix produit</label>
            <input type="text" class="form-control" id="prix" aria-describedby="Prix produit" name="prix">
        </div>
        <div>
            @error('prix')
                <li class="list-unstyled text-danger">{{ $message }}</li>
            @enderror()
        </div>

        <div class="text-danger input-group input-group-outline mb-3">
            <select name="categorie" id="categorie">
                <option value=""disabled selected>Sélectionnez une catégorie</option>
                @foreach ($categorie as $categorie)
                    <option value="{{ $categorie->id }}" required>{{ $categorie->nom_catid }}</option>
                @endforeach
            </select>
        </div>

        <div>
            @error('categorie')
                <li class="list-unstyled text-danger">{{ $message }}</li>
            @enderror()
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

    <div class="mt-5 text-center"><a href="{{ route('accueil') }}">
            <h5 class="">Retour</h5>
        </a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
