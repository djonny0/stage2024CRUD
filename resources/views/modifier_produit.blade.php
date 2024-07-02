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



    <form method="post" action="{{ route('update_produit', $produit->id) }}">
        @csrf
        <h3>Modification de produit </h3>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom produit</label>
            <input type="text" value="{{ $produit->nom_produits }}" class="form-control" id="nom"
                aria-describedby="Nom categorie" name="nom">
        </div>
        <div>
            @error('nom')
                <li class="list-unstyled text-danger">{{ $message }}</li>
            @enderror()
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix produit</label>
            <input type="text" value="{{ $produit->prix }}" class="form-control" id="prix"
                aria-describedby="Prix produit" name="prix">
        </div>
        <div>
            @error('prix')
                <li class="list-unstyled text-danger">{{ $message }}</li>
            @enderror()
        </div>
        <div class="text-danger input-group input-group-outline mb-3">
            <select name="categorie" id="categorie" required>
                <option value=""disabled selected>Sélectionnez une catégorie</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" @if ($produit->categorie->id == $categorie->id) selected @endif>
                        {{ $categorie->nom_catid }}
                    </option>
                @endforeach
            </select>
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
