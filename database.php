<?php

class Database
{
    private static $user = 'root';
    private static $pass = '';
    private static $dsn = "mysql:host=localhost;dbname=assignment";
    private static $db;

        //private properties


        private
        function __construct()
        {
        }

        //get pdo connection
         public static function getDb()
        {
            if (!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn, self::$user, self::$pass);
                    self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   // echo 'test';
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    include 'authorerror.php';
                    exit();
                }
            }
            return self::$db;
        }

}