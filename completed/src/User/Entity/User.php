<?php
namespace Completed\User\Entity;

class User
{
    public $id;
    public $email;
    public $isActive = 1;
    public function __construct(array $args = [])
    {
        if ($args) {
            foreach ($args as $key => $val) {
                $this->$key = $val;
            }
        }
    }
}
