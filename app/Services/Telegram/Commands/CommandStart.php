<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;

class CommandStart extends Command {

    public function handle(){

        Message::getInstance()->text(__('telegram.start_bot'))
        ->keyboard(Keyboard::start())->forceEdit($this->user->userId, $this->messageId);
    }
}