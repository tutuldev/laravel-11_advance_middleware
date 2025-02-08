<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inner Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
       <div class="row">
        <div class="col-6">
            <h2 class="mb-3">Inner Page</h2>
            <a href="{{route('dashboard')}}" class="btn btn-primary">Go Back to Dashbord</a>
            <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
        </div>
        <div class="col-6">
            @if (auth()->check())
            {{Auth::user()->name}}
            @endif
        </div>
       </div>
    </div>
</body>
</html>
