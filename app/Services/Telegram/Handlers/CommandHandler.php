<?php


namespace App\Services\Telegram\Handlers;

use App\Services\Telegram\Commands\CommandStart;

class CommandHandler extends MessageHandler {
    
    private string $command = '';

    private string $payload = '';

    public function handle(){

        $this->prepareCommand();

        switch($this->command){
            case '/start':
                (new CommandStart($this->user, $this->message))->handle();
            break;
        }
    }

    private function prepareCommand(){
        $message = explode(' ', $this->message);
        $this->command = $message[0];
        $this->payload = $message[1]??'';
    }


}