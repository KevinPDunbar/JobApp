<?php
require_once 'Favorites.php';

class FavoritesTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getFavorites() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM favorites";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve favorites");
        }
        
        return $statement;
    }
    
    public function getFavoritesById($userId) {

        
         $sqlQuery = "SELECT * FROM job WHERE id in(SELECT jobId FROM favorites WHERE userId = :userId)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "userId" => $userId
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve favorites");
        }
        
        return $statement;
    }
    
    public function insert($p) {
        $sql = "INSERT INTO favorites(userId, jobId)" .
                "VALUES (:userId, :jobId)";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "userId"        => $p->getUserId(),
            "jobId"       => $p->getJobId()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert user");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }

  
    
    public function delete($userId, $jobId) {
        $sql = "DELETE FROM favorites WHERE userId = :userId AND jobId = :jobId";
        
        $statement = $this->connection->prepare($sql);
        $params = array(
            "userId" => $userId,
            "jobId" => $jobId
        );
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete favorite");
        }
    }    

}

