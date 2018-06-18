<?php
class DB {

    private static $host = "localhost";
    private static $database = "id751473_jobs";
    private static $username = "id751473_jobsclick";
    private static $password = "hello";
    
    public static function getConnection() {
        $dsn = 'mysql:host=' . DB::$host . ';dbname=' . DB::$database;

        $connection = new PDO($dsn, DB::$username, DB::$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

}