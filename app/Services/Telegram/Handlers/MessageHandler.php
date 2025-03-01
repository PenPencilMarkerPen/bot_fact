<?php

namespace App\Services\Telegram\Handlers;

use App\DTO\UserDTO;
use App\Services\Telegram\Commands\CommandStart;


class MessageHandler {
    
    protected string $message = '';
    protected UserDTO $user;

    public function __construct($user, $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function handle(){

        switch($this->message){
            case 'Начать':
            case 'начать':
                (new CommandStart($this->user, $this->message))->handle();
            break;
        }
    }
}