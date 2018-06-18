<?php
class Job {
    private $jobTitle;
    private $jobDescription;
    private $address;
    private $jobType;
    private $lat;
    private $lng;
    private $employer;
    private $email;
    
    public function __construct($id, $jobTitle, $jobDescription, $address, $jobType, $lat, $lng, $employer, $email) {
        $this->id = $id;
        $this->jobTitle = $jobTitle;
        $this->jobDescription = $jobDescription;
        $this->address= $address;
        $this->jobType = $jobType;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->employer = $employer;
        $this->email = $email;
    }
    
    public function getId() { return $this->id; }
    public function getJobTitle() { return $this->jobTitle; }
    public function getJobDescription() { return $this->jobDescription; }
    public function getAddress() { return $this->address; }
    public function getJobType() { return $this->jobType; }
    public function getLat() { return $this->lat; }
    public function getLng() { return $this->lng; }
    public function getEmployer() { return $this->employer; }
    public function getEmail() { return $this->email; }
}
