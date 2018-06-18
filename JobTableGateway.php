<?php
require_once 'Job.php';

class JobTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getJobs() {

        $sqlQuery = "SELECT * FROM job";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve jobs");
        }
        
        return $statement;
    }
    
    public function getLatestJobs() {

        $sqlQuery = "SELECT * FROM job ORDER BY id DESC";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve jobs");
        }
        
        return $statement;
    }
    
    
    
    public function getJobById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM job WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve job");
        }
        
        return $statement;
    }
    
     public function getJobsBySearch($jobTitle, $address, $jobType) {
        
        $sqlQuery = "SELECT * FROM job WHERE jobTitle like '%".$jobTitle."%' AND address like '%".$address."%' AND jobType like '%".$jobType."%'";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "jobTitle" => $jobTitle,
            "address" => $address,
            "jobType" => $jobType
        );
        
        $statement->execute($params);
        
        
        
        return $statement;
    }
    
    public function insert($p) {
        $sql = "INSERT INTO job(jobTitle, jobDescription, address, jobType, lat, lng, employer, email)" .
                "VALUES (:jobTitle, :jobDescription, :address, :jobType, :lat, :lng, :employer, :email)";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "jobTitle"        => $p->getJobTitle(),
            "jobDescription"       => $p->getJobDescription(),
            "address"      => $p->getAddress(),
            "jobType" => $p->getJobType(),
            "lat"      => $p->getLat(),
            "lng"      => $p->getLng(),
            "employer"      => $p->getEmployer(),
            "email"      => $p->getEmail()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert job");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }

    public function update($p) {
        $sql = "UPDATE job SET " .
                "jobTitle = :jobTitle, " . 
                "jobDescription = :jobDescription, " .
                "address = :address, " .
                "jobType = :jobType, " .
                "lat = :lat, " .
                "lng = :lng " . 
                "employer = :employer " .
                "email = :email " .
                " WHERE id = :id";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "id"          => $p->getId(),
            "jobTitle"        => $p->getJobTitle(),
            "jobDescription"       => $p->getJobDescription(),
            "address"      => $p->getAddress(),
            "jobType" => $p->getJobType(),
            "lat"      => $p->getLat(),
            "lng"      => $p->getLng(),
            "employer"      => $p->getEmployer(),
            "email"      => $p->getEmail()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not update job");
        }
    }
    
    public function delete($id) {
        $sql = "DELETE FROM job WHERE id = :id";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "id" => $id
        );
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete job");
        }
    }    

}

