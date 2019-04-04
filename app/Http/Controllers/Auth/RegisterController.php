<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fio' => ['required', 'string', 'max:255', 'regex:/[А-Яа-я]+ [А-Яа-я]+ [А-Яа-я]+/u'],
            'login'=>['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6' ,'confirmed'],
            'treatment' =>['accepted']
        ],[
            'fio.required'=>'Введите Ф.И.О.',
            'fio.regex'=>'Введите в формате: Фамилия Имя Отчетсво',
            'login.required' =>"Введите Логин",
            'email.required' =>"Введите E-Mail",
            'email.unique'=>'Пользователь с таким E-Mail уже существует',
            'login.unique'=>'Пользователь с таким Логином уже существует',
            'login.email' =>"Не правильный формат E-Mail",
            'password.required' =>"Введите пароль",
            'password.confirmed' =>"Введённые пароли не совпадает",
            'password.min' => 'Пароль должен состоять как минимум из 6 символов',
            'treatment.accepted' =>'Для продолжения регистрации вы должны согласится на обработку персональных данных'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fio'=>$data['fio'],
            'login' => $data['login'],
            'email'=>$data['email'],
            'password' =>bcrypt($data['password']),
        ]);
    }
}
