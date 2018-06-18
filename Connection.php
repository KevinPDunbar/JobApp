<?php
class Connection {
    
    
    
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database
            $host = "localhost";
            $database = "id751473_jobs";
            $username = "id751473_jobsclick";
            $password = "hello";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }
        
        return Connection::$connection;
    }
}