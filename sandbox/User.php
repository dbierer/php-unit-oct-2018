<?php
class User
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //** create method which makes test work **//
    public function getAllActive()
    {
        // code goes here
    }
}
