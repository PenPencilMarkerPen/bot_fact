<?php

namespace App\Http\Controllers\Bot;

use App\Services\Telegram\Handlers\RequestHandler;
use App\Services\Telegram\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MaxController {

    public function index(Request $request){

        $telegram = Telegram::getApi();
        $update = $telegram->getWebhookUpdate();

        try {
            $handler = new RequestHandler($update);
            $handler->handle();
        }catch(\Exception $e){
            Log::error('Telegram controller error: '. ' Error: '. $e->getMessage() . ' File: '. $e->getFile() . ' Line: ' . $e->getLine());
        }
    
        return response(null, 200);
    }
}