<?php
require_once 'User.php';

class UserTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getUsers() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM users";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    public function getUserById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM users WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve user");
        }
        
        return $statement;
    }
    
    public function getUserByEmail($email) {
        $sqlQuery = "SELECT * FROM users WHERE email = :email";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "email" => $email
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("No user is registered with that email address");
        }
        
        return $statement;
    }
    
    public function insert($p) {
        $sql = "INSERT INTO users(firstName, lastName, address, username, password, email)" .
                "VALUES (:firstName, :lastName, :address, :username, :password, :email)";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "firstName"        => $p->getFirstName(),
            "lastName"       => $p->getLastName(),
            "address"      => $p->getAddress(),
            "username" => $p->getUsername(),
            "password"      => $p->getPassword(),
            "email"      => $p->getEmail()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert user");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }

    public function update($p) {
        $sql = "UPDATE users SET " .
                "firstName = :firstName, " . 
                "lastName = :lastName, " .
                "address = :address, " .
                "username = :username, " .
                "password = :password, " .
                "email = :email " .
                " WHERE id = :id";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "id"          => $p->getId(),
            "firstName"        => $p->getFirstName(),
            "lastName"       => $p->getLastName(),
            "address"      => $p->getAddress(),
            "username" => $p->getUsername(),
            "password"      => $p->getPassword(),
            "email"      => $p->getEmail()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not update user");
        }
    }
    
    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "id" => $id
        );
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete user");
        }
    }    

}

