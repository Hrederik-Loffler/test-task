<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

function view($name, $data = [], $dirName = '')
{
    extract($data);
    return require "..//app/views/{$name}.view.php";
}

// function redirect($path)
// {
//     return header("Location: /{$path}");
// }

function redirect($http = false)
{
    if($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }
    header("Location: $redirect");
    exit;
}

function extractFields(array $target, array $fields): array
{
    $res = [];

    foreach ($fields as $field) {
        $res[$field] = trim(htmlspecialchars($target[$field]));
    }

    return $res;
}

function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES);
}
