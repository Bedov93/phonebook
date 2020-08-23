<?php

class Database
{
    protected static $_instance = null;
    public $dbh;

    private function __clone()
    {
    }

    private function __construct()
    {
        global $config;
        try {
            $this->dbh = new PDO('mysql:host=' . $config['db']['host'] .
                ';dbname=' . $config['db']['name'] . '', $config['db']['user'], $config['db']['password']);
            $this->dbh->exec("SET NAMES utf8");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }

    }

    public static function getInstance()
    {

        if (null === self::$_instance) {
            // создаем новый экземпляр
            self::$_instance = new self();
        }

        return self::$_instance;
    }


    public static function rawQuery($query, $params) {
        $keys = array();

        foreach ($params as $key => $value) {
            if (is_string($key)) {
                $keys[] = '/:'.$key.'/';
            } else {
                $keys[] = '/[?]/';
            }
        }

        $query = preg_replace($keys, $params, $query, 1, $count);

        return $query;
    }

    public static function query($sql, $params = [])
    {
        $stmt = self::getInstance()->dbh->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':' . $key, $val, $type);
            }
        }
        if(!$stmt->execute()) {
            dd($stmt->errorInfo());
        }
        return $stmt;
    }

    public static function row($sql, $params = [])
    {
        $result = self::getInstance()->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function column($sql, $params = [])
    {
        $result = self::getInstance()->query($sql, $params);
        return $result->fetchColumn();
    }

    public static function lastInsertId()
    {
        return self::getInstance()->dbh->lastInsertId();
    }
}