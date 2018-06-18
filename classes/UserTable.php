<?php

require_once 'User.php';

class UserTable {
    private $link;
    
    public function __construct($connection) {
        $this->link = $connection;
    }

    public function insert($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $sql = "INSERT INTO users(firstName, lastName, address, username, password, email) "
             . "VALUES (:firstName, :lastName, :address, :username, :password, :email)";

        $params = array(
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'address' => $user->getAddress(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail()
        );
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save user: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('users');
        
        return $id;
    }

    public function delete($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User id required");
        }
        $sql = "DELETE FROM users WHERE id = :id";
        $params = array('id' => $user->getId());
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not delete user: " . $errorInfo[2]);
        }
    }

    public function update($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $id = $user->getId();
        if ($id == null) {
            throw new Exception("User id required");
        }
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $params = array(
            'password' => $user->getPassword(),
            'id' => $user->getId()
        );
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not update user: " . $errorInfo[2]);
        }
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $address = $row['address'];
            $username = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
            $user = new User($id, $firstName, $lastName, $address, $username, $password, $email);
        }
        return $user;
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = array('username' => $username);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $address = $row['address'];
            $username = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
           $user = new User($id, $firstName, $lastName, $address, $username, $password, $email);
        }
        return $user;
    }

    public function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve users: " . $errorInfo[2]);
        }

        $users = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $address = $row['address'];
            $username = $row['username'];
            $password = $row['password'];
            $email = $row['email'];
           $user = new User($id, $firstName, $lastName, $address, $username, $password, $email);
            $users[$id] = $user;

            $row = $stmt->fetch();
        }
        return $users;
    }
}

?>
