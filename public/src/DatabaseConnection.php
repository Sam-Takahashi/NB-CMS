<?php

final class DatabaseConnection
{
    // my db object instance(class instance)
    private static $instance = null;
    // my db connection
    private static $connection;

    public static function getInstance()
    {
        //if null then create new
        if (is_null(self::$instance)) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }


    // setting private to prevent multiple instances.
    private function __construct()
    {
    }

    private function __clone()
    {
    }
// need to research why __wakeup throws error
    // private function __wakeup()
    // {
    // }


    public static function connect($host, $dbName, $port, $user, $password)
    {
        self::$connection = new PDO("mysql:dbname=$dbName;host=$host;port=$port", $user, $password);
    }

    public static function getConnection()
    {
        return self::$connection;
    }
}
