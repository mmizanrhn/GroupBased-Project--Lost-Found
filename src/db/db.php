<?php

namespace LF\db;

class db
{

    const DB_HOST = 'localhost';
    const DB_NAME = 'lostandfound';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    public static $DB_con = '';

    public static function connect(){
        try
        {
            self::$DB_con = new \PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME,self::DB_USER,self::DB_PASSWORD);
            self::$DB_con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);



        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return self::$DB_con;
    }
}

//calling function

//DB::connect();