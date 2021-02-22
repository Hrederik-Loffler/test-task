<?php

namespace App\Controllers;

use App\Models\User;
use Valitron\Validator;

class AuthController
{
    private $flag = false;
    public static $errors = [];
    public static $rules = [];

    public function signup()
    {
        if(!empty($_POST)) {
            $user = new User;
            $data = $_POST;
            $user->load($data);
            if(!self::validate($data)) {
                self::getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            } else {
                $user->fillable['password'] = password_hash($user->fillable['password'], PASSWORD_BCRYPT);
                $user->insert('users', $user->fillable);
                $this->flag = true;
            }
            if($this->flag) {
                $_SESSION['success'] = 'Вы успешно зарегестрировались';
                redirect('/login');
            } else {
                $_SESSION['error'] = 'Ошибка';
            }
        }
        
        redirect();
    }

    public function login()
    {   
        if (!empty($_POST)) {
            unset($_SESSION['error']);
            $user = new User;
            $user->checkIn();
            if ($user->checkIn()) {
                if($_SESSION['user'][0]['status'] == 'disable') {
                    $_SESSION['error'] = 'Вы были забанены';
                } else {
                    unset($_SESSION['error']);
                }
                $_SESSION['success'] = 'Вы успешно авторизованы';
                redirect('/user/index');
            } else {
                $_SESSION['error'] = 'Не верные данные';
            }
            redirect();
        }
    }  

    public static function logout()
    {
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        if(isset($_SESSION['admin'])) unset($_SESSION['admin']);
        redirect('/');
    }

    public static function validate($data)
    {
        $validator = new Validator($data);
        $validator->rules(self::getRules());
        if($validator->validate()) {
            return true;
        }
        self::$errors = $validator->errors();
        return false;
    }

    public static function getRules()
    {
        return self::$rules = [
            'required' => [
                'firstname',
                'lastname',
                'email',
                'phone',
                'password'
            ],
            'email' => [
                'email'
            ],
            'lengthMin' => [
                ['password', 6]
            ],
        ];
    }

    public static function getErrors()
    {
        $err = '<ul>';
        foreach(self::$errors as $error) {
            foreach($error as $value) {
                $err .= "<li>$value</li>";
            }
        }
        $err .= '</ul>';
        $_SESSION['error'] = $err;
    }
}