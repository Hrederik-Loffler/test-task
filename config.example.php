<?php

return [
    'database' => [
        'connection' => 'mysql:host=127.0.0.1',
        'dbname' => 'test_task',
        'username' => 'main',
        'password' => 'passwordsql',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    ]
];