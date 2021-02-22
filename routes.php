<?php

use Bramus\Router\Router as Router;

$router = new Router;

$router->get('', '\App\Controllers\PagesController@home');
$router->get('signup', '\App\Controllers\PagesController@register');
$router->get('login', '\App\Controllers\PagesController@login');
$router->get('admin', '\App\Controllers\PagesController@admin');

$router->get('logout', '\App\Controllers\AuthController@logout');
$router->post('signup', '\App\Controllers\AuthController@signup');
$router->post('login', '\App\Controllers\AuthController@login');

$router->get('admin', '\App\Controllers\Admin\AdminController@admin');
$router->get('admin/users/', '\App\Controllers\Admin\AdminController@users');
$router->get('admin/users/edit/{id}', '\App\Controllers\Admin\AdminController@editUserShow');
$router->post('admin/users/edit/', '\App\Controllers\Admin\AdminController@editUser');

$router->get('user/index', '\App\Controllers\UserController@index');
$router->get('user/edit/{id}', '\App\Controllers\UserController@showEdit');
$router->post('user/edit/', '\App\Controllers\UserController@edit');