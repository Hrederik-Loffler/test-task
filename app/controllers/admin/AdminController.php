<?php

namespace App\Controllers\Admin;

use App\Controllers\AuthController;
use App\Models\User;
use Vendor\Core\Request;

class AdminController
{   
    public function admin()
    {   
        if(isset($_SESSION['user']) && isset($_SESSION['admin'])) {
            $title = "Админ: главная";
            return view('admin/index', compact('title'));
        } else {
            if(isset($_SESSION['user'])) {
                $_SESSION['error'] = 'У вас нет прав администратора';
            }
            AuthController::logout();
            redirect('/');
            exit('404');
        }
    }

    public function users()
    {
        if(isset($_SESSION['user']) && isset($_SESSION['admin'])) {
            $user = new User;
            $users = $user->selectAll();
            $title = 'Админ: Пользователи';
            return view('admin/users', compact('title', 'users'));
        } else {
            if(!isset($_SESSION['admin'])) {
                $_SESSION['error'] = 'У вас нет прав администратора';
            }
            AuthController::logout();
            redirect('/');
        }
    }
    
    public function editUserShow()
    {   
        if(isset($_SESSION['user']) && isset($_SESSION['admin'])) {
            $user = new User;
            $request = new Request;
            $userOne = $user->findOne($request->getId());
            $role = $user->getRole();
            $status = $user->getStatus();
            $title = 'Админ:Изменить пользователя';
            return view('admin/edit', compact('title', 'userOne', 'role', 'status'));
        } else {
            if(!isset($_SESSION['admin'])) {
                $_SESSION['error'] = 'У вас нет прав администратора';
            }
            AuthController::logout();
            redirect('/');
            exit('404');
        } 
    }

    public function editUser()
    {
        if(!empty($_POST)) {
            $user = new User;
            $data = $_POST;
            $id = $_SESSION['id'][0];
            $user->adminUpdateUser($id,$data);
            unset($_SESSION['id']);
            redirect('/admin/users');
        } else {
            die('empty POST');
        }
    }
}