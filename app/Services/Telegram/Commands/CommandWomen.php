<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;

class CommandWomen extends Command{
    
    public function handle(){
        switch($this->action['action']){
            case 'women_war_5_1':
            case 'women_war_5_2':
            case 'women_war_5_3':
                $keyMsg = 'telegram.messages.'.$this->action['action'];
                Message::getInstance()->text(__($keyMsg))
                ->keyboard(Keyboard::backWomen())
                ->image(storage_path('app/private/'.$this->action['img']))
                ->forceEdit($this->user->userId, $this->messageId);
            break;
        }
    }
}