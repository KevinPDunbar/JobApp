<?php
class Favorites {
    private $userId;
    private $jobId;


    
    public function __construct($id, $userId, $jobId) {
        $this->id = $id;
        $this->userId = $userId;
        $this->jobId = $jobId;
    }
    
    public function getId() { return $this->id; }
    public function getUserId() { return $this->userId; }
    public function getJobId() { return $this->jobId; }
}
