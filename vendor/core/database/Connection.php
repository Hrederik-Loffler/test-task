<?php

namespace Vendor\Core\Database;

use PDO;

class Connection extends PDO
{
    protected $pdo;
    protected static $instance;

    public function __construct()
    {   
        $config = require ('..//config.php');
        $this->pdo = new PDO($config['database']['connection'].';dbname='.$config['database']['dbname'],
            $config['database']['username'], $config['database']['password'],
            $config['database']['options']
        );
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function execute($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($params);
    }

    /**
     * use this method for insert\update
    */
    public function dbQuery($sql, $params) {
        $statement = $this->pdo->prepare($sql);
        $response = $statement->execute($params);
        if($response !== false) {
            return $statement->rowCount();
        }
        return [];
    }

    /**
     * use this method for select
    */
    public function querySmth($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $response = $statement->execute($params);
        if ($response !== false) {
            // return $statement->fetchAll(PDO::FETCH_ASSOC);PDO::FETCH_OBJ
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

}