<?php

namespace App\Services\Telegram\Commands;

use App\DTO\UserDTO;

abstract class Command{

    protected mixed $action;
    protected mixed $update;
    protected UserDTO $user;
    protected string $message;
    protected int $messageId;

    public function __construct($user, $message, $action=null, $update = null, $messageId=0)
    {
        $this->action = $action;
        $this->update = $update;
        $this->user = $user;
        $this->message = $message;
        $this->messageId = $messageId;
    }

    public abstract function handle();
} 