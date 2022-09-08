<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница авторизации</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<form action="{{route('logIn')}}" method="post" class="mt-3">
    @if(session()->has('errorSuccess'))
        <h3>{{session()->get('errorSuccess')}}</h3>
    @endif
    @csrf
    <input type="text" name="login" placeholder="Ваш логин" class="form-control w-25"><br>
    @error('login')<p>{{$message}}</p>@enderror
    <input type="password" name="password" placeholder="Ваш пароль" class="form-control w-25"><br>
    @error('password')<p>{{$message}}</p>@enderror
    <input type="submit" value="Авторизоваться" class="btn btn-primary">
</form>
</body>
</html>
