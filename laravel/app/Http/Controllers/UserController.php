<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidationLogin;
use App\Http\Requests\RequestValidationRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\MarshallingSessionHandler;

class UserController extends Controller
{
    /**
     * Представление шаблона авторизации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function logIn()
    {
        return view('logIn');
    }

    /**
     * Фвктическая авторизация пользователя из POST запроса
     * @param RequestValidationLogin $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(RequestValidationLogin $request)
    {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();

            return redirect()->route('welcome');
        }
        return back()->with(['errorSuccess'=>'Неверный логин или пароль']);
    }

    /**
     * Страница показа формы регистрации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Операция регистрации нового пользователя
     * @param RequestValidationRegister $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPost(RequestValidationRegister $request)
    {
        $data=$request->validated();
        $data['password']=Hash::make($data['password']);

        User::create($data);
        return back()->with(['success'=>true]);
    }

    /**
     * Выход из системы
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }
}
