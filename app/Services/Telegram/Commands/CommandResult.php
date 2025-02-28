<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;

class CommandResult extends Command{
    
    public function handle(){
        switch($this->action['action']){
            case 'result_memory_6_1':
            case 'result_memory_6_2':
            case 'result_memory_6_3':
                $keyMsg = 'telegram.messages.'.$this->action['action'];
                Message::getInstance()->text(__($keyMsg))
                ->keyboard(Keyboard::backResult())
                ->image(storage_path('app/private/'.$this->action['img']))
                ->forceEdit($this->user->userId, $this->messageId);
            break;
        }
    }
}