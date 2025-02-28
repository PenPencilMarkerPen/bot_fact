<?php

namespace App\Services\Telegram;

use Illuminate\Support\Facades\Cache;
use Telegram\Bot\Api;

class Telegram {

    private const AWAITING_MESSAGE_KEY = 'await_message';

    public static function getApi(){
        return new Api();
    }

    public static function getMessageAction($id){
        return Cache::get(self::AWAITING_MESSAGE_KEY.':'.$id);
    }

    public static function setMessageAction($id, $data){
        return Cache::put(self::AWAITING_MESSAGE_KEY.':'.$id, $data);
    }

    public static function deleteMessageAction($id){
        return Cache::delete(self::AWAITING_MESSAGE_KEY.':'.$id);
    }

}