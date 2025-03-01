<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;

class CommandDiff extends Command {

    public function handle(){

        switch($this->action['action']){
            case 'difficulties_4_1':
            case 'difficulties_4_2':
            case 'difficulties_4_3':
                $keyMsg = 'telegram.messages.'.$this->action['action'];
                Message::getInstance()->text(__($keyMsg))
                ->keyboard(Keyboard::backDiff())
                ->image(storage_path('app/private/'.$this->action['img']))
                ->forceEdit($this->user->userId, $this->messageId);
            break;
        }


        // Message::getInstance()->text(__('telegram.start_bot'))
        // ->keyboard(Keyboard::start())->send($this->user->userId);
    }
}