<?php

namespace App\Services\Telegram\Handlers;

use App\DTO\UserDTO;
use Illuminate\Support\Facades\App;
use Telegram\Bot\Objects\Update;

class RequestHandler {

    private Update $update;
    private string $requestType = '';
    private UserDTO $user;
    private int $chatId;
    private string $lang = 'ru';

    public function __construct(Update $update)
    {
        $this->setUpdate($update);
        $this->setRequestType();
        $this->setChatId();
        $this->setUser();
        App::setLocale($this->lang);
    }

    private function setUpdate(Update $update){
        $this->update = $update;
    }

    private function setRequestType(){
        if(isset($this->update['message']['message_id'])){
            $text = $this->update['message']['text']??'';
            if($text){
                if($text[0] == '/') $this->requestType = 'command';
                else $this->requestType = 'message';
            }
            else $this->requestType = 'message';
        }
        elseif(isset($this->update['callback_query'])) $this->requestType = 'callback';
    }

    private function setChatId(){
        if($this->requestType == 'message' || $this->requestType == 'command') {
            $this->chatId = $this->update['message']['chat']['id'];
        } 
        elseif($this->requestType == 'callback') {
            $this->chatId = $this->update['callback_query']['message']['chat']['id'];
        }
        else die();
    }

    private function setUser(){
        if($this->requestType == 'message' || $this->requestType=='command'){
            $username = $this->update['message']['from']['username'] ?? '';
            $name = $this->update['message']['from']['first_name']??'';
        }
        elseif($this->requestType == 'callback') {
            $username = $this->update['callback_query']['from']['username']??'';
            $name = $this->update['callback_query']['from']['first_name']??'';
        }

        $this->user = new UserDTO($this->chatId, $name);
    }

    public function handle(){   
        $handler = false;

        if($this->requestType == 'command'){
            $handler = new CommandHandler($this->user, $this->update['message']['text']);
        }
        elseif ($this->requestType == 'message') {
            $handler = new MessageHandler($this->user, $this->update['message']['text']);
        }
        elseif($this->requestType == 'callback') {
            $callbackId = $this->update->getCallbackQuery()->getId();
            $data = $this->update['callback_query']['data'];
            $messageId = $this->update['callback_query']['message']['message_id'];


            $handler = new CallbackHandler($this->user,$data, $messageId, $callbackId);
        }
        
        if($handler) {
            $handler->handle();
        }
    }
}