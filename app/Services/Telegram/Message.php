<?php

namespace App\Services\Telegram;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\FileUpload\InputFile;

class Message {

    private array $data = [
        'parse_mode' => 'html',
        'disable_web_page_preview' => false,
    ];

    private Api $telegram;

    public function __construct()
    {
        $this->telegram = Telegram::getApi();
    }

    public static function getInstance(){
        return new static();
    }

    public function text($text){
        $this->data['text'] = $text;

        return $this;
    }

    public function keyboard($keyboard){
        $this->data['reply_markup'] = $keyboard;
        
        return $this;
    }

    public function disableWebPagePreview(){
        $this->data['disable_web_page_preview'] = true;
        
        return $this;
    }

    public function fileId($fileId){
        $this->data['file_id'] = $fileId;

        return $this;
    }

    public function attachmentType($type){
        $this->data['attachment_type'] = $type;

        return $this;
    }

    public function image($imageUrl){
        $this->data['photo'] = $imageUrl;

        return $this;
    }

    public function video($videoUrl){
        $this->data['video'] = $videoUrl;
        return $this;
    }

    private function setChatId($chatId){
        $this->data['chat_id'] = $chatId;
    }

    private function setMessageId($messageId){
        $this->data['message_id'] = $messageId;
    }

    private function uploadFiles($type){
        $this->data['caption'] = $this->data['text'];
        if (isset($this->data['file_id']) && !empty($this->data['file_id'])){
            $this->data[$type] = $this->data['file_id']; 
            unset($this->data['file_id']);
        }
        else {
            $this->data[$type] = new InputFile($this->data[$type]);
        }
    }

    public function send($chatId){
        $this->setChatId($chatId);

        try {
            if(isset($this->data['photo']) && $this->data['photo']){
                $this->uploadFiles('photo');
                $message = $this->telegram->sendPhoto($this->data);
            }
            elseif(isset($this->data['video']) && $this->data['video']){
                $this->uploadFiles('video');
                $message = $this->telegram->sendVideo($this->data);
            }
            else {
                $message = $this->telegram->sendMessage($this->data);
            }
        }catch(\Exception $exception){
            Log::error('Error message sending: ' . $exception->getMessage());
            return false;
        }

        return $message;
    }

    public function edit($chatId, $messageId){
        $this->setChatId($chatId);
        $this->setMessageId($messageId);

        try {
            $message = $this->telegram->editMessageText($this->data);
        }catch(\Exception $e){
            Log::error('Error message edit: ' . $e->getMessage());
            return false;
        }

        return $message;
    }

    public function forceEdit($chatId, $messageId){

        // $message = $this->edit($chatId, $messageId);

        // if($message) return $message;

        $this->delete($chatId, $messageId);

        return $this->send($chatId);
    }

    public function delete($chatId, $messageId){

        $this->setChatId($chatId);
        $this->setMessageId($messageId);

        try {
            $message = $this->telegram->deleteMessage($this->data);
        }catch(\Exception $e){
            Log::error('Error message delete: ' . $e->getMessage());
            return false;
        }
    }

}