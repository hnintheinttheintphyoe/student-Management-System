<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This is admin dashboard</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
    <button class="btn btn-danger">Logout</button>
    </form>
</body>
</html>
