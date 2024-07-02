<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <form method="post" action="{{route('registeruser')}}">
        @csrf
        <div class="container-fluid">
            <h2 class="text-center">Formulaire d'inscription</h2>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom complet</label>
                <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom">
            </div>
            @error('nom')
                <li class="list-unstyled text-danger">{{$message}}</li>
            @enderror()
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            @error('email')
                <li class="list-unstyled text-danger">{{$message}}</li>
            @enderror()
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @error('password')
                <li class="list-unstyled text-danger">{{$message}}</li>
            @enderror()
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password confirmation</label>
                <input type="password" class="form-control" id="password_confirmation"name="password_confirmation">
            </div>
            @error('password_confirmation')
                <li class="list-unstyled text-danger">{{$message}}</li>
            @enderror()
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1"name="checkbox">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div class="mt-5 text-center"><a href="{{ route('showlogin') }}" class="text-decoration-none">
        <h5 class="">J'ai déjà un compte</h5>
    </a></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
