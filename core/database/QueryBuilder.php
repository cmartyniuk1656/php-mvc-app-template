<?php


class QueryBuilder {

    protected $pdo;

    public function __construct($pdo) {

        $this->pdo = $pdo;

    }

    public function selectAll($table) {

        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);

    }

    // public function insertTodo($table, $val) {

    //     $statement = $this->pdo->prepare("INSERT INTO $table (description, completed) VALUES ($val, false)");

    //     $statement->execute();

    // }

    public function insert($table, $params) {

        $sql = sprintf(

            'insert into %s (%s) values (%s)',
            $table, 
            implode(', ', array_keys($params)),
            ':' . implode(', :', array_keys($params))

        );

        try {

            $statement = $this->pdo->prepare($sql);

            $statement->execute($params);

        }
        catch(Exception $e) {

            die('Something went wrong.');

        }

    }


}