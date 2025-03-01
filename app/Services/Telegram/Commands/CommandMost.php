<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;

class CommandMost extends Command{
    
    public function handle(){
        switch($this->action['action']){
            case 'most_battles_3_1':
            case 'most_battles_3_2':
            case 'most_battles_3_3':
                $keyMsg = 'telegram.messages.'.$this->action['action'];
                Message::getInstance()->text(__($keyMsg))
                ->keyboard(Keyboard::backMost())
                ->image(storage_path('app/private/'.$this->action['img']))
                ->forceEdit($this->user->userId, $this->messageId);
            break;
        }
    }
}