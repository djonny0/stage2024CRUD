<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    </div>
    {{-- table des produits --}}
    <h2 class="text-center">Produit n° {{$produit->id}}</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom produit</th>
                <th scope="col">Prix produit</th>
                <th scope="col"># catégorie</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td scope="row">{{ $produit->nom_produits }}</td>
                    <td scope="row">{{ $produit->prix }}</td>

                    <td scope="row">
                        {{ $produit->categorie->nom_catid }}
                    </td>
        </tbody>
    </table>

    <div class="mt-5 text-center"><a href="{{ route('accueil') }}">
        <h5 class="">Retour</h5>
    </a></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
