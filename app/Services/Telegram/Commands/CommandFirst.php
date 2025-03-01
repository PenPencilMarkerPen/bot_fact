<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Keyboard;
use App\Services\Telegram\Message;
use Illuminate\Support\Facades\Storage;

class CommandFirst extends Command {

    public function handle(){

        switch($this->action['action']){
            case 'first_stage_2_1':
            case 'first_stage_2_2':
            case 'first_stage_2_3':
                $keyMsg = 'telegram.messages.'.$this->action['action'];
                Message::getInstance()->text(__($keyMsg))
                ->keyboard(Keyboard::backFirst())
                ->image(storage_path('app/private/'.$this->action['img']))
                ->forceEdit($this->user->userId, $this->messageId);
            break;
        }


        // Message::getInstance()->text(__('telegram.start_bot'))
        // ->keyboard(Keyboard::start())->send($this->user->userId);
    }
}