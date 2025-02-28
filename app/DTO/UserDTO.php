<?php

namespace App\DTO;

class UserDTO {

    public int $userId;
    public string $name;

    public function __construct(int $userId, string $name)
    {
        $this->userId = $userId;
        $this->name = $name;        
    }

}