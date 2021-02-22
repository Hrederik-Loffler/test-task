<?php

namespace App\Controllers;

use App\Models\User;
use Vendor\Core\PhotoUploader;

class UserController
{
    public function index()
    {   
        if(isset($_SESSION['user'])) {
            $user = new User;
            $userOne = $_SESSION['user'];
            $title = 'Личный кабинет';
            return view('user/index', compact('title', 'userOne'));
        } else {
            redirect('/');
        }
    }

    public function showEdit()
    {   
        if(isset($_SESSION['user']) && $_SESSION['user'][0]['status'] !== 'disable') {
            $user = new User;
            $userOne = $_SESSION['user'];
            $title = 'Пользователь: изменить данные';
            return view('user/edit', compact('title','userOne'));
        } else {
            $_SESSION['error'] = 'Вы были забанены';
            redirect('/');
        }
    }

    public function edit()
    {   
        if(!empty($_FILES)) {
            PhotoUploader::upload($_FILES['avatar']);
            $pathImg = PhotoUploader::$path ?? '';
        }
        if (!empty($_POST)) {
            $user = new User;
            $data = $_POST;
            $id = $_SESSION['user'][0]['id'];
            $user->updateUser($id, $pathImg, $data);
            $user->findOne($id);
            $_SESSION['user'] = $user->findOne($id);
            unset($_SESSION['id']);
            redirect('/user/index');
        } else {
            redirect();
        }
    }
}