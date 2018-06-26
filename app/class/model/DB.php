<?php
/**
 * Created by PhpStorm.
 * User: filipe
 * Date: 26/06/18
 * Time: 05:56
 */

namespace Lib\Model;


class DB
{
    private $_pdo;
    private $_statement;
    private $_sql;
    private static $_instance = null;

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->_pdo;
    }

    /**
     * @return mixed
     */
    public function getStatement()
    {
        return $this->_statement;
    }

    /**
     * @return mixed
     */
    public function getSql()
    {
        return $this->_sql;
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        return self::$_instance;
    }

    /**
     * @param mixed $pdo
     */
    private function setPdo($pdo): void
    {
        $this->_pdo = $pdo;
    }

    /**
     * @param mixed $statement
     */
    private function setStatement($statement): void
    {
        $this->_statement = $statement;
    }

    /**
     * @param mixed $sql
     */
    private function setSql($sql): void
    {
        $this->_sql = $sql;
    }

    /**
     * @param mixed $instance
     */
    private static function setInstance($instance): void
    {
        self::$_instance = $instance;
    }

    public static function createDB()
    {
        if (null === self::getInstance())
        {
            self::setInstance(new DB);
        }
        return self::getInstance();
    }

    private function __construct()
    {
        try
        {
            $this->setPdo(new \PDO("mysql: host=localhost; dbname=biblioteca", "root", "guitar"));
            return $this->getPdo();
        }
        catch (\PDOException $e)
        {
            die($e->getMessage());
        }
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}