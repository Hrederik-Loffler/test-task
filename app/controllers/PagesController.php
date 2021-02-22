<?php

namespace App\Controllers;

use App\Models\User;

class PagesController
{
    public function home()
    {
        $title = 'Домашняя страница';
        return view('index', compact('title'));
    }

    public function register()
    {
        $title = 'Регистрация';
        return view('auth/signup', compact('title'));
    }

    public function login()
    {
        $title = 'Войти';
        return view('auth/login', compact('title'));
    }

}