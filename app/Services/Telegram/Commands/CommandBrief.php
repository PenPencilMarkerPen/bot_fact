<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;

class CommandBrief extends Command {

    public function handle(){

        switch($this->action['action']){
            case 'brief_info_1_1':
            case 'brief_info_1_2':
            case 'brief_info_1_3':
                $keyMsg = 'telegram.messages.'.$this->action['action'];
                Message::getInstance()->text(__($keyMsg))
                ->keyboard(Keyboard::backBrief())
                ->image(storage_path('app/private/'.$this->action['img']))
                ->forceEdit($this->user->userId, $this->messageId);
            break;
        }


        // Message::getInstance()->text(__('telegram.start_bot'))
        // ->keyboard(Keyboard::start())->send($this->user->userId);
    }
}