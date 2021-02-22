<?php

namespace App\Models\Model;

use Vendor\Core\Database\Connection;
use PDOException;

class Model
{
    protected $pdo;
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function load($data)
    {
        foreach($this->fillable as $name => $value) {
            if(isset($data[$name])) {
                $this->fillable[$name] = $data[$name];
            }
        }
    }

    public function querySmth($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->querySmth($sql);
    }


    public function selectEmail()
    {
        $sql = "SELECT id FROM {$this->table} WHERE email = %s";
        return $this->pdo->querySmth($sql);

    }

    public function findOne($id, $field = '')
    {
        $field = $field ? : $this->primaryKey;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->querySmth($sql, [$id]);
    }

    public function findBySql($sql, $params = [])
    {
        return $this->pdo->querySmth($sql, $params);
    }

    public function insert($table, $parameters)
    {
        //insert into %s (%s) values (%s)
        //inser into users (firstname...) values (:firstname)

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $this->pdo->dbQuery($sql, $parameters);
        } catch (PDOException $e) {
            die($e->getMessage());
        }


    }
}