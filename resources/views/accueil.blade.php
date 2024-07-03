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
    @if (session('succès'))
        <div class="alert alert-info">{{ session('success') }}</div>
    @endif

    <h1>Que voulez vous creer ?</h1>
    <div class="row">
        <div class="col d-flex">
            <div><a href="{{ route('formcategorie') }}"><button type="button"
                        class="btn btn-primary">Catégorie</button></a></div>
            @can('access-admin')
                <div class="mx-3"><a href="{{ route('form_prod') }}"><button type="button"
                            class="btn btn-success">Produit</button></a>
                </div>
            @endcan
        </div>
        @if (Auth::check())
            <div class="col offset-8 d-flex g-3">
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Déconnexion</button>
                </form>
                <div class="">{{ Auth::user()->name }}</div>
            </div>
        @else
            <div class="col offset-8">
                <a href="{{ route('showlogin') }}"><button type="submit" class="btn btn-warning">Connexion</button></a>
            </div>
        @endif

    </div>




    {{-- table des categories --}}
    <h2 class="text-center">Liste des catégories</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom catégorie</th>
                <th scope="col">Les produits de la catégorie</th>
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <th scope="col">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($categorie as $categories)
                <tr>
                    <td scope="row">{{ $categories->id }}</td>
                    <td scope="row">{{ $categories->nom_catid }}</td>

                    <td scope="row">
                        @foreach ($categories->produits as $produit)
                            {{ $produit->nom_produits }}
                        @endforeach
                    </td>
                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <td scope="row"><a href="{{ route('modifier_categorie', $categories->id) }}"><button
                                    type="button" class="btn btn-primary ">Modifier</button></a>
                            <a href="{{ route('delete_categorie', $categories->id) }}"><button type="button"
                                    class="btn btn-danger ml-3">Supprimer</button></a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- table des produits --}}
    <h2 class="text-center">Liste des produits</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom produit</th>
                <th scope="col">Prix produit</th>
                <th scope="col"># catégorie</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td scope="row">{{ $produit->id }}</td>
                    <td scope="row">{{ $produit->nom_produits }}</td>
                    <td scope="row">{{ $produit->prix }}</td>

                    <td scope="row">
                        {{ $produit->categorie->nom_catid }}
                    </td>
                    <td scope="row"><a href="{{ route('modifier_produit', $produit->id) }}"><button type="button"
                                class="btn btn-primary ">Modifier</button></a>
                        <a href="{{ route('delete_produit', $categories->id) }}"><button type="button"
                                class="btn btn-danger ml-3">Supprimer</button></a>
                        <a href="{{ route('view_product', $produit->id) }}"><button type="button" class="btn btn-info">Voir</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
