<?php
namespace Completed\User\Service;

use PDO;
use Completed\User\Entity\User as UserEntity;
class User
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->setFetchMode (PDO::FETCH_CLASS, UserEntity::class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllActive()
    {
        $rows = $this->getAll();
        $active = [];

        foreach ($rows as $entity) {
            if ($entity->isActive == 1) {
                $active[] = $entity;
            }
        }

        return $active;
    }
}
