<?php

namespace App\Models;

use App\Models\Model\Model;
use Exception;

class User extends Model
{
    public $table = 'users';
    public $primaryKey = 'id';
    public $fillable = [
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'phone' => '',
        'password' => ''
    ];

    private array $role = [
        'admin',
        'user'        
    ];

    private array $status = [
        'enable',
        'disable'
    ];

    public function getRole()
    {
        return $this->role;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function checkIn()
    {
        $email = !empty(trim($_POST['email'])) ? trim($_POST['email']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($email && $password) {
            $userOne = $this->findOne($email, 'email');
            if($userOne) {
                if(password_verify($password, $userOne[0]['password'])) {
                    foreach($userOne as $key => $value) {
                        if($key !== 'password') {
                            $_SESSION['user'][$key] = $value;
                            foreach($value as $v) {
                                if($v !== 'admin') {
                                    continue;
                                } else {
                                    $_SESSION['admin'] = $v;
                                    if(true) break;
                                }
                            }
                        }
                    };
                    return true;
                }
            }
        } else {
            throw new Exception('Incorrect form data.');
        }
        return false;
    }

    public function adminUpdateUser($id, $data)
    {
        $this->id = $id;
        $stm = [
            $data['role'] ?? '',
            $data['status'] ?? '',
            $this->id
        ];
        $sql = "UPDATE `users` SET role=?, status=? WHERE id =?";
        return $this->pdo->dbQuery($sql,$stm);
    }

    public function updateUser($id, $path = '', $data)
    {   
        $this->path = $path;
        $this->id = $id;
        $stm = [
            $data['firstname'] ?? '',
            $data['lastname'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $this->path ?? '',
            $this->id
        ];
        $sql = "UPDATE `users` SET firstname=?, lastname=?, email=?, phone=?, avatar=? WHERE id =?";
        return $this->pdo->dbQuery($sql,$stm);
    }
}