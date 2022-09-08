<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница регистрации</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<form action="{{route('register')}}" method="post" class="mt-3">
    @if(session()->has('success'))
        <h3>Операция регистрации успешно выполнена</h3>
    @endif
    @csrf
    <input type="text" name="fullname" placeholder="Ваше ФИО" class="form-control w-25"><br>
    @error('fullname')<p>{{$message}}</p>@enderror
    <input type="text" name="age" placeholder="Ваш возраст" class="form-control w-25"><br>
    @error('age')<p>{{$message}}</p>@enderror
    <input type="text" name="address" placeholder="Ваш адресс" class="form-control w-25"><br>
    @error('address')<p>{{$message}}</p>@enderror
    <input type="email" name="email" placeholder="Ваша почта" class="form-control w-25"><br>
    @error('email')<p>{{$message}}</p>@enderror
    <input type="text" name="login" placeholder="Ваш логин" class="form-control w-25"><br>
    @error('login')<p>{{$message}}</p>@enderror
    <input type="password" name="password" placeholder="Ваш пароль" class="form-control w-25"><br>
    @error('password')<p>{{$message}}</p>@enderror
    <input type="password" name="password_confirmation" placeholder="Ваш пароль повторно:" class="form-control w-25"><br>
    <input type="submit" value="Регистрация" class="btn btn-primary">
</form>
</body>
</html>
