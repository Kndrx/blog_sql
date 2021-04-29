<?php

Class Database {

    private const host = "localhost";
    private const username = "root";
    private const pwd = "root";
    private const dbName = "blog_project";

    public $id;
    public $table;
    public $columns;

    protected static function connect() {
        $dsn = 'mysql:host=' . self::host . ';dbname=' . self::dbName;
        $pdo = new PDO($dsn, self::username, self::pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

    }

    private static function query($sql, $params = []) {
        try {
            $stmt = self::connect()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute($params);
            return $stmt;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    // GENERIC FUNCTION TO GET ALL DATA FROM $table
    public static function getAll($table) {
        $fetchAll = self::query("SELECT * FROM " . $table);
        return $fetchAll->fetchAll();
    }

    public function buildColumns($params) {
        return '(' . array_reduce(array_keys($params), function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . $next;
        }, '') . ')'
        . 
        ' VALUES (' . array_reduce(array_keys($params), function($prev, $next) {
            return $prev . ($prev ? ', ' : '') . ':' . $next;
        }, '') . ')';

    }

    public function buildColumnsUpdate($params) {
        
    }

    // GENERIC FUNCTION TO GET DATA BY HIS ID
    public static function findById($id, $table) {
        $fetchById = self::query("SELECT * FROM $table WHERE id=$id LIMIT 1");
        return $fetchById-> fetch();
    }

    // GENERIC FUNCTION UPDATE
    public function update($params, $id, $table) {
        $columns = $this->buildColumnsUpdate($params);
        return $this->query("UPDATE SET $columns FROM $table WHERE id=$id", $params);
    }

    //GENERIC FUNCTION TO CREATE
    public function create($params, $table) {
        $columns = $this->buildColumns($params);
        return $this->query("INSERT INTO $table $columns", $params);
    }

    // GENERIC FUNCTION TO DELETE
    public function delete($table, $id) {
        return $this->query("DELETE FROM $table WHERE id=$id");
    }
}

?>