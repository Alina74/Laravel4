@extends('index')
@section('title','Страница авторизации')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('login')}}" method="post" class="mt-3">
                    @if(session()->has('errorSuccess'))
                        <div class="alert alert-danger">{{session()->get('errorSuccess')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Ваш логин</label>
                        <input type="text"
                               class="form-control @error('login') is-invalid @enderror"
                               id="inputLogin"
                               name="login"
                               aria-describedby="invalidLogin">
                        @error('login')
                        <div id="invalidLogin" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Ваш пароль</label>
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="inputPassword"
                               name="password"
                               aria-describedby="invalidPassword">
                        @error('password')
                        <div id="invalidPassword" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Авторизация</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
