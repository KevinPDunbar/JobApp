<?php
class User {
    private $firstName;
    private $lastName;
    private $address;
    private $username;
    private $password;
    private $email;
    private $cv;

    
    public function __construct($id, $firstName, $lastName, $address, $username, $password, $email) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    
    public function getId() { return $this->id; }
    public function getFirstName() { return $this->firstName; }
    public function getLastName() { return $this->lastName; }
    public function getAddress() { return $this->address; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getEmail() { return $this->email; }
    public function getCv() { return $this->cv; }
}
